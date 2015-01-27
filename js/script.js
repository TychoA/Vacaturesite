/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */
window.onload = function () {
    "use strict";
    var toInbox = document.getElementsByClassName('toInbox')[0], i, j, k,
        toSend = document.getElementsByClassName('toSend')[0],
        unreadMails = document.getElementsByClassName('unread').length,
        verstuurdKlik = false, //check of erop ontvangen is geklikt
        AlRead = false,
        webadres = window.location.href,// Check op welke pagina we zitten
        clicked, // Onthoudt welk bericht wordt aangeklikt
        reageerDiv = document.getElementsByClassName('reageren')[0], // Variablen voor het reageren op vacatures
        beantwoordArea = document.getElementsByClassName('beantwoorden')[0],
        beantwoordClicked = 0;
    
    //
    // HIERONDER: ALLES VOOR DE INBOX
    // INLADEN VAN INBOX, VERSTUURD, HUIDIG_BERICHT; 
    // WETEN WELK BERICHT IS GEKLIKT,
    //
    
    function getXMLHttpRequest() { // Ook voor oudere browsers
        if (window.XMLHttpRequest) {
            return new window.XMLHttpRequest();
        } else {
            try {
                return new window.ActiveXObject("MSXML2.XMLHTTP");
            } catch (ex) {
                return null;
            }
        }
    }
     
    function loadBericht() {
        var onRequest = getXMLHttpRequest();
        function handler() {
            if (onRequest.readyState === 4) {
                if (onRequest.status === 200) {
                    var text;
                    if (!verstuurdKlik && !AlRead) {
                        if (unreadMails === 0) {
                            text = "0 ongelezen bericht(en)";
                        } else {
                            unreadMails--;
                            text = unreadMails + " ongelezen bericht(en)";
                        }
                    } else {
                        text = unreadMails + " ongelezen bericht(en)";
                    }
                    document.getElementById('divInbox').innerHTML = onRequest.responseText;
                    document.getElementById('unread').innerHTML = text;
                    AlRead = false;
                    verstuurdKlik = false;
                }
            }
        }
        
        if (onRequest !== null) {
            onRequest.open("GET", "huidig_bericht.php?id=" + clicked, true);
            onRequest.onreadystatechange = handler;
            onRequest.send(null);
        } else {
            window.alert("AJAX (XMLHTTP) not supported.");
        }
    }
    
     // Maakt de h4 met class 'klikt', klikbaar
    function makeClickable() {
        var h4 = document.getElementsByClassName('klikt'),
            readMails = document.getElementsByClassName('read');
        
        function makeClickHandler(i) {
            return function () {
                clicked = i;
                loadBericht();
            };
        }
        
        function read(k) {
            return function () {
                AlRead = true;
            };
        }
        
        for (k = 0; k < readMails.length; k += 1) {
            console.log(readMails[k].parentNode);
            readMails[k].parentNode.addEventListener("click", read(k));
        }
        
        for (i = 0; i < h4.length; i += 1) {
            h4[i].addEventListener("click", makeClickHandler(i));
        }
    }
    
    function ver_Klik(i) {
        return function () {
            verstuurdKlik = true;
        };
    }
    
    function loadInbox() {
        var onRequest = getXMLHttpRequest();
        function handler() {
            if (onRequest.readyState === 4) {
                if (onRequest.status === 200) {
                    document.getElementById('divInbox').innerHTML = onRequest.responseText;
                    // Opnieuw h4 klikbaar maken
                    makeClickable();
                }
            }
        }

        if (onRequest !== null) {
            onRequest.open("GET", "inbox.php", true);
            onRequest.onreadystatechange = handler;
            onRequest.send(null);
        } else {
            window.alert("AJAX (XMLHTTP) not supported.");
        }
        
    }
    
    function loadSend() {
        var onRequest = getXMLHttpRequest();
        function handler() {
            if (onRequest.readyState === 4) {
                if (onRequest.status === 200) {
                    var verstuurd = document.getElementsByClassName('klikt verstuurd');
                    document.getElementById('divInbox').innerHTML = onRequest.responseText;
                    // Opnieuw h4 klikbaar maken
                    makeClickable();
                    
                    for (j = 0; j < verstuurd.length; j += 1) {
                        verstuurd[j].addEventListener("click", ver_Klik(j));
                    }
                }
            }
        }

        if (onRequest !== null) {
            onRequest.open("GET", "verstuurd.php", true);
            onRequest.onreadystatechange = handler;
            onRequest.send(null);
        } else {
            window.alert("AJAX (XMLHTTP) not supported.");
        }
        
    }
    
    // Alleen als we op berichten.php zitten, dit laden.
    if (webadres.indexOf('berichten.php') >= 0) {
        toInbox.onclick = loadInbox;
        toSend.onclick = loadSend;
        makeClickable();
    }
    
    //
    // HIERONDER: DETAILS_VACATURE PAGINA
    // FUNCTIE'S VOOR HET OPENEN VAN REAGEREN
    //
    
    function slowFall() {
        var textarea = document.getElementById('beantwoord'), i = 50,
            fall = setInterval(function () {
                textarea.style.height = i;
                if (i < 200) {
                    i += 4;
                } else {
                    clearInterval(fall);
                }
            }, 10);
        
        fall();
    }
    
    function climb() {
        var c = 200, i, textarea = document.getElementById('beantwoord');
        var slowClimb = setInterval(function () {
            i = c + 'px';
            textarea.style.height = i;
            if (c < 0) {
                clearInterval(slowClimb);
                beantwoordArea.style.display = 'none';
                beantwoordClicked = 0;
            }
            c -= 5;
        }, 10);
        slowClimb();
    }

    reageerDiv.onclick = function () {
        if (!beantwoordClicked) {
            beantwoordArea.style.display = 'block';
            beantwoordClicked = 1;
            slowFall();
        } else {
            climb();
        }
    };
    
    
};

// Confirm boxes in admin
function deleteVacature(id) {
    if (confirm("Weet u zeker dat u deze vacature wilt verwijderen? Deze handeling is niet ongedaan te maken!") == true) {
        window.location.assign("update.php?kind=vacature&id=" + id)
    }
}
function deleteWerknemer(id) {
    if (confirm("Weet u zeker dat u het profiel van deze werknemer wilt verwijderen? Deze handeling is niet ongedaan te maken!") == true) {
        window.location.assign("update.php?kind=werknemer&id=" + id)
    }
}

function deleteWerkgever(id) {
    if (confirm("Weet u zeker dat u het profiel van deze werknemer wilt verwijderen? Deze handeling is niet ongedaan te maken!") == true) {
        window.location.assign("update.php?kind=werkgever&action=delete&id=" + id)
    }
}