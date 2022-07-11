let validationButton = document.getElementById ('validation-button');
let celNumber = document.getElementById ('celnumber');
let validationCodeContainer = document.getElementById (
  'validation-code-container'
);

validationButton.addEventListener ('click', function (event) {
  event.preventDefault ();

  let url = `http://127.0.0.1:8000/send/${celNumber.value}`;
  let token = $('meta[name="csrf-token"]').attr ('content');
  axios
    .post (url, {
    })
    .then ((response) => {
        alert ('O código de validação foi enviado para o seu celular');

        validationCodeContainer.classList.remove ('d-none');
    })
    .catch (function (error) {
      console.log (error);
    });
});
