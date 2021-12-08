class AppStorage{

    storeToken(token){
        localStorage.setItem('token',token);
    }
    storeLastname(lastname){
        localStorage.setItem('lastname', lastname)
    }
    storeMiddlename(middlename){
        localStorage.setItem('middlename', middlename)
    }
    storeFirstname(firstname){
        localStorage.setItem('firstname', firstname)
    }
    storeRole(role){
        localStorage.setItem('role', role)
    }
    
    store(token,lastname,middlename,firstname,role){
        this.storeToken(token)
        this.storeLastname(lastname)
        this.storeMiddlename(middlename)
        this.storeFirstname(firstname)
        this.storeRole(role)
     }
   
     clear(){
         localStorage.removeItem('token')
         localStorage.removeItem('lastname')
         localStorage.removeItem('middlename')
         localStorage.removeItem('firstname')
         localStorage.removeItem('role')
     }
   
     getToken(){
         localStorage.getItem(token);
     }
   
    
    getLastname(){
        localStorage.getItem(lastname);
    }
    getFirstname(){
        localStorage.getItem(firstname);
    }
    getMiddlename(){
        localStorage.getItem(middlename);
    }
    getRole(){
        localStorage.getItem(role);
    }
   
   
   
   }
   
   export default AppStorage = new AppStorage();