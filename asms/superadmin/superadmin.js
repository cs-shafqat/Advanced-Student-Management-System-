 function handleinput(){
        var un=0,pasw=0;
       
        if(document.getElementById("first_name").value == ""){
            if(!(onblurFname(document.getElementById("first_name")))){
                 return false;
            }
        }
        if(document.getElementById("first_name").value != ""){
            if(!(onblurFname(document.getElementById("first_name")))){
                
                 return false;
            }
        }
        if(document.getElementById("ldate")){
            if(!(onblurDate(document.getElementById("ldate")))){
                
                 return false;
            }
        }
        if(document.getElementById("sdate")){
            
            if(!(onblurStartDate(document.getElementById("sdate")))){
                 
                 return false;
            }
        }

        if(document.getElementById("last_name").value == ""){
            if(!(onblurLname(document.getElementById("last_name")))){
                 return false;
            }
        }
        if(document.getElementById("last_name").value != ""){
            if(!(onblurLname(document.getElementById("last_name")))){
                
                 return false;
            }
        }
        if(document.getElementById("email").value == ""){
            if(!(onblurEmail(document.getElementById("email")))){
                 return false;
            }
        }
        if(document.getElementById("email").value != ""){
            if(!(onblurEmail(document.getElementById("email")))){
                
                 return false;
            }
        }
        if(document.getElementById("txtNumeric").value == ""){
            if(!(onblurPhone(document.getElementById("txtNumeric")))){
                 return false;
            }
        }
        if(document.getElementById("txtNumeric").value != ""){
            if(!(onblurPhone(document.getElementById("txtNumeric")))){
                
                 return false;
            }
        }
        if(document.getElementById("password").value == ""){
            if(!(onblurpasw(document.getElementById("password")))){
                 return false;
            }
        }
        if(document.getElementById("password").value != ""){
            if(!(onblurpasw(document.getElementById("password")))){
                
                 return false;
            }
        }
        if(document.getElementById("passwordcon").value == ""){
            if(!(onblurpaswcon(document.getElementById("passwordcon")))){
                 return false;
            }
        }
        if(document.getElementById("passwordcon").value != ""){
            if(!(onblurpaswcon(document.getElementById("passwordcon")))){
                
                 return false;
            }
        }
        if(document.getElementById("user_name").value == ""){
            if(!(onblurUsername(document.getElementById("user_name")))){
                 return false;
            }
        }
        if(document.getElementById("user_name").value != ""){
            if(!(onblurUsername(document.getElementById("user_name")))){
                
                 return false;
            }
        }

       
         if(!(checkSize())){
            return false;
        }
        
        return true;
       
        
    }
 
  //  document.getElementById("form").onsubmit = handleinput;
//}
        function onblurevt(evt, t) {
            if(t.value == ""){
            t.style.backgroundColor = "pink";
            document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter username</div>";
            return false;
            }
            else{
                
            }
            return true;
        }
        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which //e.which; String.fromCharCode(e.which) // or
                }
                else { return true; }
                if(t.value==""){
                    if ((charCode == 95)||( charCode == 46)||( charCode == 64))
                        return false;
                }
                
                else{
                    var str=t.value;
                    if( charCode == 64){
                        for(var i=0; i<str.length;i++) {
                            if (str[i] === "@") return false;
                        }
                    }
                    
                    var strlen=str.length;
                    
                    if((str[strlen-1] == ".")||( str[strlen-1] == "_")||( str[strlen-1] == "@")){
                        if ((charCode == 95)||( charCode == 46)||( charCode == 64))
                            return false;
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)|| (charCode == 95)||( charCode == 46)||( charCode == 64))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function checkEmail(t){

             if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
            var str=t.value;
            if(str.length>70){
                t.style.backgroundColor = "pink";
                document.getElementById("emailError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 70 characters</div>";
                return false;
            }
            var key=0;
            var atCount=0;
            
            if((str[0] == ".")||( str[0] == "_")||( str[0] == "@")){
                key=1;
            }
            else if((str[str.length-1] == ".")||( str[str.length-1] == "_")||( str[str.length-1] == "@")){
                if((str[str.length-2] == ".")||( str[str.length-2] == "_")||( str[str.length-2] == "@")){
                    key=1;
                }
            }
            
            for(var i=0; i<str.length;i++) {
                var charCode = str.charCodeAt(i);
                
                if((str[i] == ".")||( str[i] == "_")||( str[i] == "@")){
                    if((str[i-1] == ".")||( str[i-1] == "_")||( str[i-1] == "@")){
                        key=1;
                        break;
                    }
                }
                if((charCode == 64)&&(atCount==0)){
                    atCount=1;
                    continue;
                }
                if((charCode == 64)&&(atCount==1)){
                    key=1;
                    break;
                }
                if(atCount==0){
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode > 47 && charCode < 58)|| (charCode == 95)||( charCode == 46)||( charCode == 64)){
                        
                        continue;
                    }
                    else{
                        key=1;
                        break;
                    }
                }
                if(atCount==1){
                   if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||( charCode == 46)){
                        
                        continue;
                    }
                    else{
                        key=1;
                        break;
                    }
                }
                    
                    
                
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("emailError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid email address.</div>";
                return false;
            }
            else{
                t.style.backgroundColor = "white";
                document.getElementById("emailError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function onblurEmail(t){
            var atCount=0;
            var key=1;
            if(checkEmail(t)){
                var str=t.value;
                if(str.length>70){
                    t.style.backgroundColor = "pink";
                    document.getElementById("emailError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 70 characters</div>";
                    return false;
                }
                var charCode;
                for(var i=0; i<str.length;i++) {
                    charCode = str.charCodeAt(i);
                    if((charCode == 64)&&(atCount==0)){
                        atCount=1;
                        continue;
                    }
                    if((charCode == 46)&&(atCount==1)){
                        atCount=2;
                        break;
                    }
                }
                charCode = str.charCodeAt(str.length-1);
                if(atCount==2 && str[i]!=" "){
                    if((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                        key=0;
                    }
                }
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("emailError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid email address.</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("emailError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function checkFname(t){
            var str=t.value;
            if(str.length>30){
                t.style.backgroundColor = "pink";
                document.getElementById("fnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 30 characters</div>";
                return false;
            }
            var key=0;
            for(var i=0; i<str.length;i++) {
                charCode = str.charCodeAt(i);
                if(str[i]==" "){
                    if(str[i-1]==" "){
                        key=1;
                        break;
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||( charCode == 32)){
                    continue;
                }
                else{
                    key=1;
                    break;
                }
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("fnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid name.<br/> don't use num, special characters and extra spaces</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("fnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function onblurFname(t){
            var str=t.value;
            var key=1;
            if(str.length>30){
                t.style.backgroundColor = "pink";
                document.getElementById("fnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 30 characters</div>";
                return false;
            }
            if((checkFname(t))&&(str.length>0)){
                key=0;
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("fnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid name.<br/> don't use num, special characters and extra spaces</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("fnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function checkLname(t){
            var str=t.value;
            if(str.length>30){
                t.style.backgroundColor = "pink";
                document.getElementById("lnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 30 characters</div>";
                return false;
            }
            var key=0;

            for(var i=0; i<str.length;i++) {
                charCode = str.charCodeAt(i);
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                    continue;
                }
                else{
                    key=1;
                    break;
                }
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("lnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid last name.<br/> don't use num, special characters and spaces</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("lnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function onblurLname(t){
            var str=t.value;
            if(str.length>30){
                t.style.backgroundColor = "pink";
                document.getElementById("lnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 30 characters</div>";
                return false;
            }
            var key=1;
            if((checkLname(t))&&(str.length>0)){
                key=0;
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("lnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid last name.<br/> don't use num, special characters and spaces</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("lnameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function checkUsername(t){
            var str=t.value;
            if(str.length>20){
                t.style.backgroundColor = "pink";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 20 characters</div>";
                return false;
            }
            var key=0;
            charCode = str.charCodeAt(0);
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
               
            }
            else{
               t.style.backgroundColor = "pink";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>username must be start with Alphabets</div>";
                return false;
            }
            
            for(var i=0; i<str.length;i++) {
                charCode = str.charCodeAt(i);
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode > 47 && charCode < 58)){
                    continue;
                }
                else{
                    key=1;
                    break;
                }
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid username.<br/> don't use special characters and spaces</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function onblurUsername(t){
            var str=t.value;
            if(str.length>30){
                t.style.backgroundColor = "pink";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>you can only maximum 30 characters</div>";
                return false;
            }
            var key=0;
            if(str.length==0){
                key=1;
            }
            charCode = str.charCodeAt(0);
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
               
            }
            else{
               t.style.backgroundColor = "pink";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>username must be start with Alphabets</div>";
                return false;
            }
            for(var i=0; i<str.length;i++) {
                charCode = str.charCodeAt(i);
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode > 47 && charCode < 58)){
                    continue;
                }
                else{
                    key=1;
                    break;
                }
            }
            if(key==1){
                t.style.backgroundColor = "pink";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Please enter a valid username.<br/> don't use special characters and spaces</div>";
                return false;
            }
            else if(key==0){
                t.style.backgroundColor = "white";
                document.getElementById("usernameError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }

        function checkSize()
        {
            var input = document.getElementById("upload");
            // check for browser support (may need to be modified)
            if(input.files && input.files.length == 1)
            {           
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
        }
        function checkPhone(t){
            var str=t.value;
            if(str.length>0){
                if(str[0]!="0"){
                    t.style.backgroundColor = "pink";
                    document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>first digit should be '0'</div>";
                    return false;
                }
                if(str[1]=="0"){
                    t.style.backgroundColor = "pink";
                    document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>second digit should not be '0'</div>";
                    return false;
                }
                else{
                    t.style.backgroundColor = "white";
                    document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                    return true;
                }
            }
            else{
                t.style.backgroundColor = "white";
                document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
            
        }
        function onblurPhone(t){
            var str=t.value;
            if(str.length<10){
                t.style.backgroundColor = "pink";
                document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>minimum length must be 10</div>";
                return false;
            }
            if(checkPhone(t)){
                t.style.backgroundColor = "white";
                document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
            else{
                t.style.backgroundColor = "pink";
                document.getElementById("phoneError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>first digit should be '0'<br/>second digit should not be '0'</div>";
                return false;
            }
            
        }
        function onblurpasw(t){
            var str=t.value;
            if(document.getElementById("passwordcon").value!=""){
                //onblurpaswcon();
            }
            if(str.length<6){
                t.style.backgroundColor = "pink";
                document.getElementById("passwordError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>Enter minimum 6 characters</div>";
                return false;
            }
            else{
                t.style.backgroundColor = "white";
                document.getElementById("passwordError").innerHTML = "<div style='color:red;margin-bottom: 20px;'></div>";
                return true;
            }
        }
        function onblurpaswcon(t){
            if(document.getElementById("password").value=="")
                {return false;}
            if(document.getElementById("password").value==t.value){
                t.style.backgroundColor = "white";
                document.getElementById("passwordconError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>password match</div>";
                return true;
            }
            else{
                t.style.backgroundColor = "pink";
                document.getElementById("passwordconError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>password not match</div>";
                return false;
            }
        }
        function onblurDate(t){
            
            
            newDate = new Date(t.value);
            oldDate = new Date(document.getElementById("sdate").value);

            if(newDate.getTime()<oldDate.getTime()){
                document.getElementById("dateError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>end date maust be greater than start date of contract</div>";
                
                return false;
            
            }else{
                document.getElementById("dateError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>accepted</div>";
                    
                return true;
            }
            
        }
        function onblurStartDate(t){

            
            newDate = new Date(t.value);
            oldDate = new Date("2016-08-01");
            if(newDate.getTime()<oldDate.getTime()){
                document.getElementById("startDateError").innerHTML = "<div style='color:red;margin-bottom: 20px;'>wrong start date  of contract</div>";
                
                return false;
            }else{
                document.getElementById("startDateError").innerHTML = "<div style='color:green;margin-bottom: 20px;'>accepted</div>";
              
                return true;
            }
            
        }