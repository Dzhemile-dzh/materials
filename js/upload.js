const form = document.getElementById('materialForm');
form.addEventListener('submit', (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'controllerMaterial.php', true);
  xhr.onload = function () {
      if (this.status === 200) {
          try {
              const response = JSON.parse(this.responseText);
              if (response.success) {
                  const material = response.material;
                  alert("You added material successfully");
                  form.reset();
              } else {
                  console.error(response.message);
              }
          } catch (error) {
              console.error('Invalid JSON:', this.responseText);
          }
      }
  };
  xhr.send(formData);
});
