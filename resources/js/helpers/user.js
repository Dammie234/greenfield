import Token from './token'
import AppStorage from './appstorage'


class User{

	responseAfterLogin(res){
		const access_token = res.data.access_token
		const lastname = res.data.user.lastname
		const middlename = res.data.user.middlename
		const firstname = res.data.user.firstname

		const role = res.data.user.role
		if (Token.isValid(access_token)) {
			AppStorage.store(access_token,lastname,middlename,firstname,role)
		}
	}
 

	hasToken(){
		const storeToken = localStorage.getItem('token');
		if (storeToken) {
			return Token.isValid(storeToken)? true : false
		}
		false
	}

	loggedIn(){
		return this.hasToken()
	}

	lastname(){
		if (this.loggedIn()) {
			return localStorage.getItem('lastname');
		}
	}

	middlename(){
		if (this.loggedIn()) {
			return localStorage.getItem('middlename');
		}
	}
	firstname(){
		if (this.loggedIn()) {
			return localStorage.getItem('firstname');
		}
	}
	role(){
		if (this.loggedIn()) {
			return localStorage.getItem('role');
		}
	}


	id(){
	  	if (this.loggedIn()) {
	  		const payload = Token.payload(localStorage.getItem('token'));
	  		return payload.sub
	  	}
	  	return false
	  }

 
 
}

export default User = new User()