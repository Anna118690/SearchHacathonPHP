/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

document.getElementById("select_matiere").addEventListener("change" ,(event) => {
    
   effacerChampNouvelleSousMatiere(); 
    
    
    console.log (event.target.value);
    let formulaire = new FormData();
    formulaire.append ("matiereChoisie" , event.target.value);
    
    
    // appel ajax obtenir sous categories
    fetch ("./obtenirSousCategories.php",{
       method: "POST",
       body: formulaire    
    })
    .then ( (response) => { return (response.json()) })
    .catch(error => console.error('Error:', error))
    .then ( (responseJSON) => { 
        // remplacer le select, rajouter les options
        let objSelect = document.getElementById("sousmatier");
        objSelect.innerHTML = '';
        responseJSON.forEach ((elem) => {
            let option = document.createElement("option");
            option.value = elem['id'];
            option.text = elem['sousmatier'];
            objSelect.appendChild(option);
            
            
        });
        let optionNouvelle = document.createElement("option");
        optionNouvelle.value = "rajouter";
        optionNouvelle.text = "NOUVELLE";
        objSelect.appendChild(optionNouvelle);
        
    }); 
});

// si on clique dans la sousmatiere on doit verifier si on a clique sur NOUVELLE
document.getElementById("sousmatier").addEventListener("change" ,(event) => {
    
    console.log (event.target.value);
    if (event.target.value === "rajouter"){
        let containerMain = document.getElementById("containerMain");
        let inputSousMatiere = document.createElement("input");
        inputSousMatiere.name = "nouvelleSousMatiere";
        inputSousMatiere.id = "nouvelleSousMatiere";
        

        containerMain.appendChild(inputSousMatiere);
    }
    else {
        
        effacerChampNouvelleSousMatiere();
    }
});

function effacerChampNouvelleSousMatiere() {
    
    // effacer le champ pour la nouveulle sous matiere
        let inputNouvelleSousMatiere = document.getElementById("nouvelleSousMatiere");
        if (inputNouvelleSousMatiere){
           containerMain.removeChild (inputNouvelleSousMatiere);  
        }
}

// 