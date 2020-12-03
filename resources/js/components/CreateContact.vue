<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
							Name: <input v-model="name" ></input>
							Email: <input v-model="email" ></input>
							
							<button v-on:click="addContact()" >Add contact</button>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
		props: {
			url: { type: String, default: '', required: true }
		},
		data: {
			name: "",
			email: ""
		},
		methods: {
			async addContact() {
				  let newUser = { full_name: this.name , email: this.email};
				
				  try {
					const { data } = await axios.post(this.url, newUser)
						if ( (data.full_name == newUser.full_name) && (data.email == newUser.email) ){
							alert("new user added");
						}else{
							console.log("sonmething went wrong savig a user");
						}
					
				  } catch (e) {
					console.log("sonmething went wrong savig a user: " + e)
				  }
			},
			
			clickSubmit: function (event) {
				this.addContact();
			}

		}
    }
</script>
