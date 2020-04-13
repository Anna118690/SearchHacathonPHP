/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

document.getElementById("select_matiere").addEventListener("change" ,(event) => {
    
    
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

        
    }); 
});



 