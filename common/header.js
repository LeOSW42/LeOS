var etat=0; // On indique qu'au debut aucun menu n'est ouvert.

/* On enleve le menu CSS si JS est active. */
if (document.styleSheets[0].cssRules) { document.styleSheets[0].cssRules[3].style.visibility = "inherit" }
else if (document.styleSheets[0].rules) { document.styleSheets[0].rules[3].style.visibility = "inherit" }
if (document.styleSheets[0].cssRules) { document.styleSheets[0].cssRules[4].style.background = "none" }
else if (document.styleSheets[0].rules) { document.styleSheets[0].rules[4].style.background = "none" }
if (document.styleSheets[0].cssRules) { document.styleSheets[0].cssRules[5].style.background = "none" }
else if (document.styleSheets[0].rules) { document.styleSheets[0].rules[5].style.background = "none" }
if (document.styleSheets[0].cssRules) { document.styleSheets[0].cssRules[6].style.visibility = "hidden" }
else if (document.styleSheets[0].rules) { document.styleSheets[0].rules[6].style.visibility = "hidden" }

/* Fonction pour afficher un menu */
function popaction(id)
{
	if (id=='pop1') { 	document.getElementById('item1').style.border="1px solid #333";
				document.getElementById('item1').style.height="20px";
				document.getElementById('item1').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop2') { 	document.getElementById('item2').style.border="1px solid #333";
				document.getElementById('item2').style.height="20px";
				document.getElementById('item2').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop3') { 	document.getElementById('item3').style.border="1px solid #333";
				document.getElementById('item3').style.height="20px";
				document.getElementById('item3').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop4') { 	document.getElementById('item4').style.border="1px solid #333";
				document.getElementById('item4').style.height="20px";
				document.getElementById('item4').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop5') { 	document.getElementById('item5').style.border="1px solid #333";
				document.getElementById('item5').style.height="20px";
				document.getElementById('item5').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop6') { 	document.getElementById('item6').style.border="1px solid #333";
				document.getElementById('item6').style.height="20px";
				document.getElementById('item6').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop7') { 	document.getElementById('item7').style.border="1px solid #333";
				document.getElementById('item7').style.height="20px";
				document.getElementById('item7').style.boxShadow="inset 0 0 10px #555"; }
	if (id=='pop1') { document.getElementById('msg1').style.visibility="visible"; }
	if (id=='pop2') { document.getElementById('msg2').style.visibility="visible"; }
	if (id=='pop3') { document.getElementById('msg3').style.visibility="visible"; }
	if (id=='pop4') { document.getElementById('msg4').style.visibility="visible"; }
	if (id=='pop5') { document.getElementById('msg5').style.visibility="visible"; }
	if (id=='pop6') { document.getElementById('msg6').style.visibility="visible"; }
	if (id=='pop7') { document.getElementById('msg7').style.visibility="visible"; }
}

/* Fonction pour fermer un ou les menus */
function unpop(id)
{
	if (etat==1 && id=='all') {
	document.getElementById('item1').style.border="";
	document.getElementById('item1').style.height="";
	document.getElementById('item1').style.boxShadow="";
	document.getElementById('item2').style.border="";
	document.getElementById('item2').style.height="";
	document.getElementById('item2').style.boxShadow="";
	document.getElementById('item3').style.border="";
	document.getElementById('item3').style.height="";
	document.getElementById('item3').style.boxShadow="";
	document.getElementById('item4').style.border="";
	document.getElementById('item4').style.height="";
	document.getElementById('item4').style.boxShadow="";
	document.getElementById('item5').style.border="";
	document.getElementById('item5').style.height="";
	document.getElementById('item5').style.boxShadow="";
	document.getElementById('item6').style.border="";
	document.getElementById('item6').style.height="";
	document.getElementById('item6').style.boxShadow="";
	document.getElementById('item7').style.border="";
	document.getElementById('item7').style.height="";
	document.getElementById('item7').style.boxShadow="";
	document.getElementById('msg1').style.visibility="hidden";
	document.getElementById('msg2').style.visibility="hidden";
	document.getElementById('msg3').style.visibility="hidden";
	document.getElementById('msg4').style.visibility="hidden";
	document.getElementById('msg5').style.visibility="hidden";
	document.getElementById('msg6').style.visibility="hidden";
	document.getElementById('msg7').style.visibility="hidden";
	etat=0;
	}

	if (etat==1 && id=='pop1') {
	document.getElementById('item1').style.border="";
	document.getElementById('item1').style.height="";
	document.getElementById('item1').style.boxShadow="";
	document.getElementById('msg1').style.visibility="hidden";
	}

	if (etat==1 && id=='pop2') {
	document.getElementById('item2').style.border="";
	document.getElementById('item2').style.height="";
	document.getElementById('item2').style.boxShadow="";
	document.getElementById('msg2').style.visibility="hidden";
	}

	if (etat==1 && id=='pop3') {
	document.getElementById('item3').style.border="";
	document.getElementById('item3').style.height="";
	document.getElementById('item3').style.boxShadow="";
	document.getElementById('msg3').style.visibility="hidden";
	}

	if (etat==1 && id=='pop4') {
	document.getElementById('item4').style.border="";
	document.getElementById('item4').style.height="";
	document.getElementById('item4').style.boxShadow="";
	document.getElementById('msg4').style.visibility="hidden";
	}

	if (etat==1 && id=='pop5') {
	document.getElementById('item5').style.border="";
	document.getElementById('item5').style.height="";
	document.getElementById('item5').style.boxShadow="";
	document.getElementById('msg5').style.visibility="hidden";
	}

	if (etat==1 && id=='pop6') {
	document.getElementById('item6').style.border="";
	document.getElementById('item6').style.height="";
	document.getElementById('item6').style.boxShadow="";
	document.getElementById('msg6').style.visibility="hidden";
	}

	if (etat==1 && id=='pop7') {
	document.getElementById('item7').style.border="";
	document.getElementById('item7').style.height="";
	document.getElementById('item7').style.boxShadow="";
	document.getElementById('msg7').style.visibility="hidden";
	}
}

/* Fonction appelee par le client pour ouvrir un menu lors du clic */
function pop(msg,id)
{
	if (etat==0) {
	popaction(id)
	setTimeout('etat=1;', 10);
	}
}

/* Fonction appelee par le client pour changer de menu en survolant l'autre titre */
function popover(msg,id)
{
	if (etat==1) {
		popaction(id)
		if (id=='pop1') { unpop('pop2'); unpop('pop3'); unpop('pop4'); unpop('pop5'); unpop('pop6'); unpop('pop7'); }
		if (id=='pop2') { unpop('pop1'); unpop('pop3'); unpop('pop4'); unpop('pop5'); unpop('pop6'); unpop('pop7'); }
		if (id=='pop3') { unpop('pop1'); unpop('pop2'); unpop('pop4'); unpop('pop5'); unpop('pop6'); unpop('pop7'); }
		if (id=='pop4') { unpop('pop1'); unpop('pop2'); unpop('pop3'); unpop('pop5'); unpop('pop6'); unpop('pop7'); }
		if (id=='pop5') { unpop('pop1'); unpop('pop2'); unpop('pop3'); unpop('pop4'); unpop('pop6'); unpop('pop7'); }
		if (id=='pop6') { unpop('pop1'); unpop('pop2'); unpop('pop3'); unpop('pop4'); unpop('pop5'); unpop('pop7'); }
		if (id=='pop7') { unpop('pop1'); unpop('pop2'); unpop('pop3'); unpop('pop4'); unpop('pop5'); unpop('pop6'); }
	}
}

/* Fonction de gestion de la fenetre A propos... */
function about(mode)
{
	if (mode=='on') {
		document.getElementById('about').style.display="block";
	}
	if (mode=='off') {
		document.getElementById('about').style.display="none";
	}
}

/* Fonction de gestion de la fenetre Credits */
function credit(mode)
{
	if (mode=='on') {
		document.getElementById('credit').style.display="block";
	}
	if (mode=='off') {
		document.getElementById('credit').style.display="none";
	}
}

document.onclick = function() { unpop('all'); };

function initHeader()
{
	document.getElementById('pop1').onmouseover = function() { popover(1,'pop1'); }
	document.getElementById('pop1').onclick = function() { pop(1,'pop1'); }
	document.getElementById('pop2').onmouseover = function() { popover(2,'pop2'); }
	document.getElementById('pop2').onclick = function() { pop(2,'pop2'); }
	document.getElementById('pop3').onmouseover = function() { popover(3,'pop3'); }
	document.getElementById('pop3').onclick = function() { pop(3,'pop3'); }
	document.getElementById('pop4').onmouseover = function() { popover(4,'pop4'); }
	document.getElementById('pop4').onclick = function() { pop(4,'pop4'); }
	document.getElementById('pop5').onmouseover = function() { popover(5,'pop5'); }
	document.getElementById('pop5').onclick = function() { pop(5,'pop5'); }
	document.getElementById('pop6').onmouseover = function() { popover(6,'pop6'); }
	document.getElementById('pop6').onclick = function() { pop(6,'pop6'); }
	document.getElementById('pop7').onmouseover = function() { popover(7,'pop7'); }
	document.getElementById('pop7').onclick = function() { pop(7,'pop7'); }
	document.getElementById('about_item').onclick = function() { about('on'); }
	document.getElementById('credits_button').onclick = function() { about('off'); credit('on'); }
	document.getElementById('credits_off_button').onclick = function() { credit('off'); }
	document.getElementById('about_off_button').onclick = function() { about('off') }
}
