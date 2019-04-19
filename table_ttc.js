function pomme(id)
{
	quantite = Number(document.getElementById(id).childNodes[7].childNodes[1].value);
	prixInitial = Number(document.getElementById(id).childNodes[7].childNodes[3].value);

	if (quantite > 0)
	{
		resultatHt = quantite * prixInitial;
		resultatTtc = resultatHt*1.2;

		resultatHt = resultatHt.toFixed(2).replace('.', ',');
		resultatHt = "€ " + resultatHt;

		resultatTtc = resultatTtc.toFixed(2).replace('.', ',');
		resultatTtc = "€ " + resultatTtc;

		document.getElementById(id).childNodes[3].innerHTML = resultatHt;
		document.getElementById(id).childNodes[5].innerHTML = resultatTtc;
	}
	else
	{

		resultatTtc = prixInitial * 1.2;
		console.log(resultatTtc);
		resultatTtc = resultatTtc.toFixed(2).replace('.', ',');
		resultatTtc = "€ " + resultatTtc;
		document.getElementById(id).childNodes[5].innerHTML = resultatTtc;

		prixInitial = prixInitial.toFixed(2).replace('.', ',');
		prixInitial = "€ " + prixInitial;
		document.getElementById(id).childNodes[3].innerHTML = prixInitial;
	}
}