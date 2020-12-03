
<template v-slot:default="{ pending, error, data }">
	<div v-if="pedning">Loading ...</div>
	<div v-else-if="error">{{ error }}</div>
	<div v-else>
		<div class="contact-list" >
			<contact v-for="contact in data"
				v-bind:full_name="contact.full_name"
				v-bind:email="contact.email"
				v-bind:route_delete="url + '/' + contact.id"
				v-bind:route_edit="url + '/' + contact.id"
			></contact>	
		</div>
	</div>
</template>

<script>
    export default {
	  props: {
		url: { type: String, default: '', required: true },
		params: { type: Object, default: () => ({}) },
	  },
	  data() {
		return {
		  pending: true,
		  error: false,
		  data: null,
		}
	  },
	  watch: {
		url() {
		  this.requestData()
		},
		params: {
		  handler() {
			this.requestData()
		  },
		  deep: true,
		},
	  },
	  mounted() {
		this.requestData()
	  },
	  methods: {
		async requestData() {
		  this.pending = true
		  try {
			const { data } = await axios.get(this.url, { params: this.params })
			this.data = data
			this.error = false
		  } catch (e) {
			this.data = null
			this.error = e
		  }
		  this.pending = false
		},
	  },
	  render() {
		return this.$scopedSlots.default({
		  pending: this.pending,
		  error: this.error,
		  data: this.data,
		})
	  },
    }
</script>
