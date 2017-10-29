 function createtemps(data, manu) {


     switch (manu) {
         case "allstudends":
             $('#Students').html("");
             $('#Ssum').html(data.length);

             // ajax for STUDENT list
             $.ajax('front/views/student_temp.html').always(function(courseTemplate) {
                 for (let i = 0; i < data.length; i++) {
                     var c = courseTemplate;
                     c = c.replace("{{num}}", i);
                     c = c.replace("{{name}}", data[i].Student_name);
                     c = c.replace("{{phone}}", data[i].Student_phone);
                     c = c.replace("{{imgsrc}}", "back/images/" + data[i].Student_image);

                     let d = document.createElement('div');
                     d.innerHTML = c;
                     $('#Students').append(d);

                     let id = "#student" + i;

                     $('body').on('click', id, function() {
                         alert("hi" + i);
                     });

                 }

             });



             break;

         case "allcourses":
             $('#course').html("");
             $('#Csum').html(data.length);


             $.ajax('front/views/course_temp.html').always(function(courseTemplate) {

                 for (let i = 0; i < data.length; i++) {
                     var c = courseTemplate;

                     c = c.replace("{{num}}", i);
                     c = c.replace("{{name}}", data[i].Course_name);
                     c = c.replace("{{descrip}}", data[i].Course_name);
                     c = c.replace("{{imgsrc}}", "back/images/" + data[i].Course_image);

                     let d = document.createElement('div');
                     d.innerHTML = c;
                     $('#course').append(d);



                 }
             });
             break;

         case "login":
             $.ajax('front/views/login_temp.html').always(function(logoutemp) {
                 var c = logoutemp;
                 c = c.replace("{{name}}", data.name);
                 c = c.replace("{{role}}", data.role);
                 c = c.replace("{{imgsrc}}", "back/images/" + data.image);
                 let d = document.createElement('div');
                 d.innerHTML = c;
                 $('#login').append(d);
             });
             break;




     }





 }