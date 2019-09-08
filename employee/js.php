<script type="text/javascript">
var un;
var regn;
var cnic;
function handleinput(){
    if(!(onblurEmail(document.getElementById("email")))) {
       return false;
    }
    if(!(onblurPhone(document.getElementById("phone")))) {
       return false;
    }
    if(!(onblurpasw(document.getElementById("password")))) {
       return false;
    }
    if(!(onblurpaswcon(document.getElementById("passwordcon")))) {
       return false;
    }
    if(un==1) {
       return false;
    }
    if(!(onblurStartDate(document.getElementById("sdate")))) {
       return false;
    }
    if(!(changeClass(document.getElementById("class")))) {
       return false;
    }
    if (!checkSize()) {return false;}
    return true;   
}
function addparent(){
    if(!(onblurEmail(document.getElementById("email")))) {
       return false;
    }
    if(!(onblurPhone(document.getElementById("phone")))) {
       return false;
    }
    if(!(onblurpasw(document.getElementById("password")))) {
       return false;
    }
    if(!(onblurpaswcon(document.getElementById("passwordcon")))) {
       return false;
    }
    if(!(onblurdob(document.getElementById("dob")))) {
       return false;
    }
    if (!checkSize()) {return false;}
    return true;   
}
function addemployee(){
    if(!(onblurEmail(document.getElementById("email")))) {
       return false;
    }
    if(!(onblurPhone(document.getElementById("phone")))) {
       return false;
    }
    if(!(onblurpasw(document.getElementById("password")))) {
       return false;
    }
    if(!(onblurpaswcon(document.getElementById("passwordcon")))) {
       return false;
    }
    if(un==1) {
       return false;
    }
    if(!(onblurdob(document.getElementById("dob")))) {
       return false;
    }
    if(!(onblurStartDate(document.getElementById("sdate")))) {
       return false;
    }
    if (!checkSize()) {return false;}
}
function addexam(){
    
    if(!(onblursDate(document.getElementById("sdate")))) {
       return false;
    }
    if(!(onblurDate(document.getElementById("edate")))) {
       return false;
    }
    return true;
 
}
function addSchool(){
    
    if(!(onblursDate(document.getElementById("sdate")))) {
       return false;
    }
    if(!(onblurDate(document.getElementById("ldate")))) {
       return false;
    }
    if(regn==1) {
       return false;
    }
    return true;
 
}
function editSchool(){
    if(!(onblurDate(document.getElementById("ldate")))) {
       return false;
    }
    return true;
}
function addresult(){
    if(!(examdate(document.getElementById("date")))) {
       return false;
    }
    return true;
}
function startses(){
    if(!(sesCheck(document.getElementById("session")))) {
       return false;
    }
    return true;
}
    function error(id,message){
            
            document.getElementById(id).innerHTML = "<div style='color:red;margin-bottom: 20px;'>"+message+"</div>";
            return false;
        }
        function success(id,message){
            
            document.getElementById(id).innerHTML = "<div style='color:green;margin-bottom: 20px;'>"+message+"</div>";
            return true;
        }
    function checkFname(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                if(e.target.selectionStart==0){
                
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                        return success("fnameError","");
                    }
                    else{
                        return error("fnameError","input only [A-Z]or[a-z] and space between them");
                    }
                }
                else{
                    var str=t.value;
                    if((str[e.target.selectionStart-1] == " ")||( str[e.target.selectionStart] == " ")){
                        if (( charCode == 32))
                            return error("fnameError","input only [A-Z]or[a-z] and space between them");
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) ||( charCode == 32))
                    return success("fnameError","");
                else
                    return error("fnameError","input only [A-Z]or[a-z] and space between them");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurFname(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("fnameError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("fnameError","");
        }
        function checkLname(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return success("lnameError","");
                else
                    return error("lnameError","input only [A-Z]or[a-z]");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurLname(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("lnameError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("lnameError","");
        }
        function checkNation(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return success("nationError","");
                else
                    return error("nationError","input only [A-Z]or[a-z]");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurNation(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("nationError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("nationError","");
        }
        function checkOccup(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return success("occupError","");
                else
                    return error("occupError","input only [A-Z]or[a-z]");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurOccup(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("occupError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("occupError","");
        }
        function checkQualif(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                var str=t.value;
                if((str[e.target.selectionStart-1] == ",")||( str[e.target.selectionStart-1] == " ") ||(str[e.target.selectionStart] == ",")||( str[e.target.selectionStart] == " ")){
                        if (( charCode == 32)||( charCode == 44))
                            return error("qualifError","");
                    }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||charCode==32||charCode==44)
                    return success("qualifError","");
                else
                    return error("qualifError","input only [A-Z]or[a-z] or , ");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurQualif(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("qualifError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("qualifError","");
        }
        function checkDesig(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                var str=t.value;
                if((str[e.target.selectionStart-1] == ",")||( str[e.target.selectionStart-1] == " ") ||(str[e.target.selectionStart] == ",")||( str[e.target.selectionStart] == " ")){
                        if (( charCode == 32)||( charCode == 44))
                            return error("desigError","");
                    }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||charCode==32||charCode==44)
                    return success("desigError","");
                else
                    return error("desigError","input only [A-Z]or[a-z] or , ");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurDesig(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("desigError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("desigError","");
        }
        function checkOffice(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                 if(e.target.selectionStart==0){
                
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                        return success("officeError","");
                    }
                    else{
                        return error("officeError","input start with only [A-Z]or[a-z]");
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode > 47 && charCode < 58))
                    return success("officeError","");
                else
                    return error("officeError","input only [A-Z]or[a-z] or [0-9] ");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurOffice(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("officeError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("officeError","");
        }
        function checkEmail(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                if(e.target.selectionStart==0){
                
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                        return success("emailError","");
                    }
                    else{
                        return error("emailError","email start with only [A-Z]or[a-z]");
                    }
                }
                else{
                    var str=t.value;
                    for(var i=0; i<str.length;i++) {
                        if (str[i] === "@"&&charCode == 64) return error("emailError","can't enter '@' more than one time");
                        if(str[i] === "@"&&((charCode>47&&charCode<58)|| (charCode > 64 && charCode < 91))&&(e.target.selectionStart>i)) return error("emailError","after @ input only [a-z] or . ");
                    }
                    if((str[e.target.selectionStart-1] == ".")||( str[e.target.selectionStart-1] == "@") ||(str[e.target.selectionStart] == ".")||( str[e.target.selectionStart] == "@")){
                        if (( charCode == 46)||( charCode == 64))
                            return error("emailError","can't enter consective '@' , '.' and togather");
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58)||( charCode == 46)||( charCode == 64))
                    return success("emailError","");
                else
                    return error("emailError","can't enter special characters and spaces");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurEmail(t,r=0){
            var atCount=0;
            var charCode;
            var str=t.value;
            if(str==""&&r==1){
                return error("emailError","please fill out this field");
            }
            else if(str==""&&r!=1){return success("emailError","");}
            else if(str[str.length-1]=="."||str[str.length-1]=="@"){
                return error("emailError","don't use @ or . at the end");
            }
            else{
                for(var i=0;i<str.length;i++){
                    charCode=str.charCodeAt(i);
                    if(charCode==64&&atCount==0){atCount=1;continue;}
                    if(charCode==46&&atCount==1){atCount=2;continue;}
                }
                if(atCount!=2){return error("emailError","* format should be example@fsf.com ");}
                else{return success("emailError","");}
            }
        }
        function checkSize()
        {
            var input = document.getElementById("upload");
            // check for browser support (may need to be modified)
            if(input.files && input.files.length == 1)
            { 
                            if(input.files[0].type=="image/jpeg"){
                    if (input.files[0].size > (2097152/2)) 
                    {
                        document.getElementById("uploadError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Image size must be less than 1 MB</div>";
                        return false;
                    }
                    else{
                        
                        document.getElementById("uploadError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                        return true;
                    }
                }
                else{
                    document.getElementById("uploadError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Image type must be image/jpeg (.jpg)</div>";
                    return false;
                }
            }
            document.getElementById("uploadError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
            return true;
        }
        function checkPhone(e,t){
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                if(e.target.selectionStart==0){
                
                    if (charCode==48){
                        return success("phoneError","");
                    }
                    else{
                        return error("phoneError","First digit should be '0'");
                    }
                }
                if(e.target.selectionStart==1){
                
                    if (!(charCode==48)){
                        return success("phoneError","");
                    }
                    else{
                        return error("phoneError","second digit should  be '0'");
                    }
                }
                if (charCode >47 && charCode < 58)
                    return success("phoneError","");
                else
                    return error("phoneError","input only [A-Z]or[a-z] or[0-9]");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurPhone(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("phoneError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("phoneError","");
            if(str.length<10)return error("phoneError","minimum length is 10 digits");
            else return success("phoneError","");
        }
        function onblurpasw(t){
            var str=t.value;
            if(str.length<6){
                return error("passwordError","minimum length should be 6");
            }else{
                return success("passwordError","");
            }
        }
        function onblurpaswcon(t){
            if(document.getElementById("password").value==""){return error("passwordconError","");}
            if(document.getElementById("password").value==t.value){return success("passwordconError","password match");}
            else{ return error("passwordconError","password not match");}
        }
        function checkUsername(e,t){
           try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                if(e.target.selectionStart==0){
                
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                        return success("usernameError","");
                    }
                    else{
                        return error("usernameError","input start with only [A-Z]or[a-z]");
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)|| (charCode >47 && charCode < 58))
                    return success("usernameError","");
                else
                    return error("usernameError","input only [A-Z]or[a-z] or[0-9]");
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onblurUsername(t,r=0){
            var str=t.value;
            if(str==""&&r==1){
                return error("usernameError","please fill out this field");
            }
            else if(str==""&&r!=1)return success("usernameError","");
            else{
                document.getElementById("usernameError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>Checking availability...</div>";
                var username=t.value;
                $.ajax({  
                    type: "POST",
                    url: "usercheck.php",  
                    data: "username="+ username, 
                    success: function(server_response){
                        $(document).ajaxComplete(function(event, request){
                            if(server_response == '0')
                            {
                                un=0;
                               return success("usernameError","Username Available");
                            }
                            else  if(server_response == '1')
                            {
                                un=1;
                               return error("usernameError","Username already exist");
                            }
                        });
                    }
                });
            }
        }
        function onblurReg(t){
            var str=t.value;
            if(str==""){
                return error("regError","please fill out this field");
            }
            else{
                document.getElementById("regError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>Checking availability...</div>";
                var reg=t.value;
                $.ajax({  
                    type: "POST",
                    url: "usercheck.php",  
                    data: "reg="+ reg, 
                    success: function(server_response){
                        $(document).ajaxComplete(function(event, request){
                            if(server_response == '0')
                            {
                                regn=0;
                               return success("regError"," Available");
                            }
                            else  if(server_response == '1')
                            {
                                regn=1;
                               return error("regError"," already exist");
                            }
                        });
                    }
                });
            }
        }
        function onblurDate(t,r=0){
            if(t.value==""&&r==1){
                return error("dateError","please select date");
            }
            else if(t.value==""&&r!=1)return success("dateError","");
            newDate = new Date(t.value);
            oldDate = new Date(document.getElementById("sdate").value);

            if(newDate.getTime()<oldDate.getTime()){
                return error("dateError","end date maust be greater than start date ");
            }else{
                return success("dateError","accepted");
            }
            
        }
         function onblursDate(t,r=0){
            if(t.value==""&&r==1){
                return error("sdateError","please select date");
            }
            else if(t.value==""&&r!=1)return success("sdateError","");
            newDate = new Date(t.value);
            oldDate = new Date;

            if(newDate.getTime()<oldDate.getTime()){
                return error("sdateError","start date maust be today or next ");
            }else{
                return success("sdateError","accepted");
            }
            
        }
        function onblurStartDate(t){
            if(t.value==""){
                return error("startDateError","please select date");
            }
            
            newDate = new Date(t.value);
            dateNow = new Date();
            
            var prevday=dateNow.getDate()-7;
            var prevmonth=dateNow.getMonth()+1;
            if(prevday<=0){
                 prevday=prevday+30;
                 prevmonth=prevmonth-1;
             }
             var prevyear=dateNow.getFullYear();
            if(prevmonth==0){
                prevyear=prevyear-1;
                prevmonth=12;
            }
            if(prevmonth<10){
                prevmonth="0"+prevmonth;
            }
            if(prevday<10){
                prevday="0"+prevday;
            }
            var prevdate= new Date(prevyear+"-"+prevmonth+"-"+prevday);
            var nextday=dateNow.getDate()+7;
            var nextmonth=dateNow.getMonth()+1;
            if(nextday>=30){
                nextday=nextday-30;
                nextmonth=nextmonth+1;
            }
            var nextyear=dateNow.getFullYear();
            if(nextmonth==13){
                nextmonth=1;
                nextyear=nextyear+1;
            }
            
            if(nextmonth<10){
                nextmonth="0"+nextmonth;
            }
            if(nextday<10){
                nextday="0"+nextday;
            }
            var nextdate=new Date(nextyear+"-"+nextmonth+"-"+nextday);
            if(newDate.getTime()<prevdate.getTime()||newDate.getTime()>nextdate.getTime()){
                return error("startDateError","date should be between previous 7 to next 7 days");
            }else{
                return success("startDateError","accepted");
            }
            
        }
        function changeClass(t){
            if(t.selectedIndex==0){
                return error("classError","select one of them");
            }
            if(document.getElementById("dob").value==""){
                return error("classError","First select your Date of Birth ");
            }
            var today = new Date();
            var birthDate = new Date(document.getElementById("dob").value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            if(age>=ages[t.selectedIndex-1]){
                return success("classError","accepted");
            }else{
                return error("classError","your age is less for this class");
            }
        }
        function cnicCheck(t,type){
            var str = t.value;
            var charCode;
            for(var i=0;i<str.length;i++){
                charCode=str.charCodeAt(i);
                if(charCode==95){
                    return error("cnicError","incomplete cnic");
                }
            }if(str.length==15){
            document.getElementById("cnicError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>Checking availability...</div>";
                var username=t.value;
                var to;
                if(type==1){
                    to="scnic="+ username;
                }else if(type==2){
                    to="ecnic="+ username;
                }else if(type==3){
                    to="pcnic="+ username;
                }   
                $.ajax({  
                    type: "POST",
                    url: "cniccheck.php",  
                    data: to, 
                    success: function(server_response){
                        $(document).ajaxComplete(function(event, request){
                            if(server_response == '0')
                            {
                                un=0;
                               return success("cnicError"," Available");
                            }
                            else  if(server_response == '1')
                            {
                                un=1;
                               return error("cnicError","already exist");
                            }
                        });
                    }
                });
            }
        }
        function onblurdob(t){

            
            newDate = new Date(t.value);
            oldDate = new Date();
            var curr=newDate.getFullYear();
            var today=oldDate.getFullYear();
            if(curr<today-90||curr>today-20){
                document.getElementById("dobError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>wrong  date  of birth</div>";
                
                return false;
            }else{
                document.getElementById("dobError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>accepted</div>";
              
                return true;
            }
            
        }
        function onfocusdate(){
            if(document.getElementById("exam_tital").value==""){
                return error("dateError","First select Exam Title ");
            }
        }
        function examdate(t){
            if(document.getElementById("exam_tital").value==""){
                return error("dateError","First select Exam Title123");
            }
            if(document.getElementById("date").value==""){
                return error("dateError","Select  Exam Date ");
            }
            var sDate = new Date(start_date[document.getElementById("exam_tital").selectedIndex-1]);
            var eDate = new Date(end_date[document.getElementById("exam_tital").selectedIndex-1]);
            var newDate= new Date(t.value);
            if(newDate.getTime()<sDate.getTime()||newDate.getTime()>eDate.getTime()){
                return error("dateError","Selected date is wrong ");
            }else{
                return success("dateError","");
            }
        }
        function sesCheck(t){
            var str = t.value;
            if(str[6]!="_"){
                return success("sesError","");
            }
            var charCode;
            for(var i=0;i<str.length;i++){
                charCode=str.charCodeAt(i);
                if(charCode==95||charCode==45){
                    return error("sesError","incomplete Session");
                }
            }

            return success("sesError","");
        }
</script>
