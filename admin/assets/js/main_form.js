// preiview image
// add disease
let imgInput = document.getElementById("ImgInput");
let previewImg = document.getElementById("previewImg");

let img_edit = document.getElementById("ImgInput-edit");
let preImg_edit = document.getElementById("previewImg-edit");
const tbody = document.querySelector("tbody");

imgInput.onchange = (evt) => {
  const [file] = imgInput.files;
  if (file) {
    previewImg.src = URL.createObjectURL(file);
  }
};



// tbody.addEventListener("click", (e) => {
//   if (e.target && e.target.matches("a.editlink")) {
//     e.preventDefault();
//     let id = e.target.getAttribute("id");
//     edit_disease(id);
//   }
// });

// const edit_disease = async (id) => {
//   const data = await fetch(
//     `../../services/dashboard_service/dashboard_action.php?disease-edit=1&id=${id}`, {
//       method: "GET"
//     }
//   );
//   const response = await data.json();
//   document.getElementById("id").value = response.id;
//   document.getElementById("table").value = response.table;
//   document.getElementById("input-disease").value = response.title;
//   document.getElementById("ImgInput-edit").value = response.Img;
// };
