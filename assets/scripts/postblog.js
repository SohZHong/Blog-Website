const file = document.querySelector("#input_image")
var uploaded_image = "";

file.addEventListener("change", function() {
  const reader = new FileReader()
  reader.addEventListener("load", () => {
    uploaded_image = reader.result
    document.querySelector("#display_image").src = uploaded_image
  })
  reader.readAsDataURL(this.files[0]);
})