<template>
    <div v-if="!deleted" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
						<div class="row">
							<div class="col-md-4">
								
							</div>
							<div class="col-md-8">
								Name: {{full_name}}<br />
								E-mail: {{email}}
							</div>
							<div class="col-md-12">
								<button v-on:click="clickEdit(route_edit)">Edit</button>
								<button v-on:click="clickDelete(route_delete)">Delete</button> 
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['full_name','email','profile_picutre', 'route_delete', 'route_edit'],
		data: function () {
			return {
			  deleted: false
			}
		},
		methods: {
			clickDelete: function (route) {
				this.requestDelete(route);
			},
			clickEdit: function (route) {
				alert(route);
			},
			async requestDelete(route) {
			  try {
				const { status } = await axios.delete(route)
				if (status ==200){
					this.deleted = true;
				}else{
					console.log("received other responsonse than 200 for delte post")
				}
			  } catch (e) {
			  }
			},
			
		}
    }
</script>
