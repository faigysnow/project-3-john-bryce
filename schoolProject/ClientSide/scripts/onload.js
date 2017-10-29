 $(document).ready(function() {
     $("#loginform").hide();
     //  const session_sto = localStorage.getItem("User");
     //  let user = JSON.parse(session_sto) || undefined;
     //  if (user == undefined) {
     //      $("#loginform").show();
     //      $("#navlist, .mainscreen").hide();




     //  } else {
     let course_model = new CourseModuleController();
     let student_model = new StudentModelController();
     let user = { name: "chani", role: "owner", image: "chani.jpg" };
     createtemps(user, 'login');
     course_model.GetAllCourse('allcourses');
     student_model.GetAllStudents('allstudends');


     //  }


 });

 //  var myJSON = JSON.stringify(NoteDataArray);
 // localStorage.setItem("Tasks", myJSON);