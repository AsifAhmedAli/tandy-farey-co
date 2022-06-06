// $(document).ready(function () {
//   // $("header").load("./assets/components/header.php");
//   $("footer").load("./assets/components/footer.php");
// });

$("#show-sidebar-btn").on("click", function () {
  $("aside").show();
});

$("#hide-sidebar-btn").on("click", function () {
  $("aside").hide();
});

// //selecting all required elements
// const dropArea = document.querySelector(".drag-area"),
//   dragText = dropArea.querySelector("h5"),
//   button = dropArea.querySelector("button"),
//   input = dropArea.querySelector("input");
// let file; //this is a global variable and we'll use it inside multiple functions

// button.onclick = () => {
//   input.click(); //if user click on the button then the input also clicked
// };

// input.addEventListener("change", function () {
//   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
//   file = this.files[0];
//   dropArea.classList.add("active");
//   showFile(); //calling function
// });

// //If user Drag File Over DropArea
// dropArea.addEventListener("dragover", (event) => {
//   event.preventDefault(); //preventing from default behaviour
//   dropArea.classList.add("active");
//   dragText.textContent = "Release to Upload File";
// });

// //If user leave dragged File from DropArea
// dropArea.addEventListener("dragleave", () => {
//   dropArea.classList.remove("active");
//   dragText.textContent = "Drag & Drop to Upload File";
// });

// //If user drop File on DropArea
// dropArea.addEventListener("drop", (event) => {
//   event.preventDefault(); //preventing from default behaviour
//   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
//   file = event.dataTransfer.files[0];
//   showFile(); //calling function
// });

// function showFile() {
//   let fileType = file.type; //getting selected file type
//   let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array
//   if (validExtensions.includes(fileType)) {
//     //if user selected file is an image file
//     let fileReader = new FileReader(); //creating new FileReader object
//     fileReader.onload = () => {
//       let fileURL = fileReader.result; //passing user file source in fileURL variable
//       // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
//       // let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
//       dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
//     };
//     fileReader.readAsDataURL(file);
//   } else {
//     alert("This is not an Image File!");
//     dropArea.classList.remove("active");
//     dragText.textContent = "Drag & Drop to Upload File";
//   }
// }

function makeread(x35){
  // document.getElementById("loader1").style.visibility = "visible";
  // alert(x35);
  $.ajax({
    type: "post",
    data: {
      x35:x35
    },
    url: "controllers.php",
    success: function (result) {
      $("#div12544").html(result);
      // document.getElementById("loader1").style.visibility = "hidden";
    }
  });
}