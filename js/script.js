/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */
// MAREKsszzzzz STUKKKKJEEE AFBLIJVEEEENN tycho.
window.onload = function () {
    "use strict";
    var toInbox = document.getElementsByClassName('toInbox')[0], i, j, k,
        toSend = document.getElementsByClassName('toSend')[0],
        unreadMails = document.getElementsByClassName('unread').length,
        verstuurdKlik = false, //check of erop ontvangen is geklikt
        AlRead = false,
        clicked; // Onthoudt welk bericht wordt aangeklikt
    
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
<<<<<<< HEAD

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
=======

        if (onRequest !== null) {
            onRequest.open("GET", "inbox.php", true);
>>>>>>> d7534605867a55b8cb082be950722e5c5645206d
            onRequest.onreadystatechange = handler;
            onRequest.send(null);
        } else {
            window.alert("AJAX (XMLHTTP) not supported.");
        }
        
    }
    
<<<<<<< HEAD
=======
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
    
>>>>>>> d7534605867a55b8cb082be950722e5c5645206d
    toInbox.onclick = loadInbox;
    toSend.onclick = loadSend;
    
    makeClickable();
<<<<<<< HEAD
};

/* DELETE FAVORIET */
/*function delFav(idvac, idwn) {

        
}*/
=======
};
>>>>>>> d7534605867a55b8cb082be950722e5c5645206d
