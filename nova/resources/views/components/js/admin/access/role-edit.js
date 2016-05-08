vue = {
	data: {
		description: "",
		name: "",
		key: "",
		oldKey: "",
		permissions: []
	},

	ready: function () {
		this.oldKey = this.key
	},

	methods: {
		updateName: function () {
			this.key = this.name.replace(/\W+/g, '-').toLowerCase()

			this.updateKey()
		},

		updateKey: function() {
			if (this.key != "" && this.key != this.oldKey) {
				var url = Nova.data.keyCheckUrl
				var postData = { key: this.key }

				this.$http.post(url, postData).then(response => {
					if (response.data.code == 0) {
						$('[name="name"]').blur()
						this.key = this.oldKey

						swal({
							title: "Error!",
							text: "Role keys must be unique. Another role is already using the key [" + postData.key + "]. Please enter a unique key.",
							type: "error",
							timer: null,
							html: true
						})
					}
				}, response => {
					$('[name="name"]').blur()
					this.key = this.oldKey

					swal({
						title: "Error!",
						text: "There was an error trying to check the role key. Please try again. (Error " + response.status + ")",
						type: "error",
						timer: null,
						html: true
					})
				})
			}
		}
	}
}