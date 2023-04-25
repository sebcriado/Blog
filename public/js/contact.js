// FONCTIONS
async function onSubmitForm(e) {
  //Stopper la soumission du formulaire
  e.preventDefault();

  // Récuperer les données du formulaire
  const form = e.currentTarget;
  const formData = new FormData(form);

  // Envoi des données au serveur
  const options = {
    method: "POST",
    body: formData,
  };

  const url = form.action;

  //   fetch(url, options)
  //     .then(function (response) {
  //       return response.json();
  //     })
  //     .then(function (data) {
  //       console.log(data);
  //     });

  const response = await fetch(url, options);
  const data = await response.json();

  // On efface les précédents message d'erreurs
  document.querySelectorAll("p.error").forEach((error) => error.remove());
  document.querySelector("p.success")?.remove();

  // Traitement des erreurs
  if (data.errors) {
    for (const fieldName in data.errors) {
      const p = document.createElement("p");
      p.textContent = data.errors[fieldName];
      p.classList.add("error");
      const input = document.getElementById(fieldName);
      input.after(p);
    }
  } else if (data.success) {
    const p = document.createElement("p");
    p.textContent = data.success;
    p.classList.add("success");
    form.before(p);
    form.reset();
  }
}

// CODE PRINCIPAL
document
  .getElementById("contact-form")
  .addEventListener("submit", onSubmitForm);
