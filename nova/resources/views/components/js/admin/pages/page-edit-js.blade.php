{!! HTML::style('nova/resources/css/bootstrap-tagsinput.css') !!}
{!! HTML::style('nova/resources/css/bootstrap-tagsinput-typeahead.css') !!}
{!! HTML::script('nova/resources/js/typeahead.bundle.min.js') !!}
{!! HTML::script('nova/resources/js/bootstrap-tagsinput.min.js') !!}
<script>
	vue = {
		data: {
			baseUrl: "{{ Request::root() }}",
			resource: "",
			type: "",
			key: "",
			uri: "",
			oldKey: "",
			oldUri: "",
			accessType: "",
			access: [],
			accessRole: [],
			accessPermission: [],
			permissionData: []
		},

		methods: {
			resetResource: function () {
				this.resource = ''
			},

			checkKey: function () {
				if (this.key != "" && this.key != this.oldKey) {
					var url = "{{ route('admin.pages.checkKey') }}"
					var postData = { key: this.key }

					this.$http.post(url, postData).then(function (response) {
						if (response.code == 0) {
							this.key = this.oldKey

							swal({
								title: "Error!",
								text: "Page keys must be unique. Another page is already using the key [" + postData.key + "]. Please enter a unique key.",
								type: "error",
								timer: null,
								html: true
							})
						}
					}, function (response) {
						swal({
							title: "Error!",
							text: "There was an error trying to check the page key. Please try again. (Error " + response.status + ")",
							type: "error",
							timer: null,
							html: true
						})
					})
				}
			},

			checkUri: function () {
				if (this.uri != "" && this.uri != this.oldUri) {
					var url = "{{ route('admin.pages.checkUri') }}"
					var postData = { uri: this.uri }

					this.$http.post(url, postData).then(function (response) {
						if (response.code == 0) {
							this.uri = this.oldUri

							swal({
								title: "Error!",
								text: "You've entered a URI that's already being used by another page. Please enter a different URI for this page.",
								type: "error",
								timer: null,
								html: true
							})
						} else {
							// Change all slashes into periods
							var newKey = this.uri.replace(/\//g, ".");

							// Take out all the URI variables
							newKey = newKey.replace(/{(.*?)}/g, "");

							// If we have consecutive periods, make them 1
							newKey = newKey.replace(/\.{2,}/g, ".");

							// Take periods off the beginning of the string
							if (newKey.charAt(0) == ".")
								newKey = newKey.substr(1);

							// Take periods off the end of the string
							if (newKey.slice(-1) == ".")
								newKey = newKey.substring(0, newKey.length - 1);

							this.key = newKey
						}
					}, function (response) {
						swal({
							title: "Error!",
							text: "There was an error trying to check the URI. Please try again. (Error " + response.status + ")",
							type: "error",
							timer: null,
							html: true
						})
					})
				}
			}
		},

		ready: function () {
			var url = this.baseUrl + '/api/access/permissions'

			this.oldKey = this.key
			this.oldUri = this.uri
			
			this.$http.get(url).then(function (response) {
				this.permissionData = response.data.data
			})
		},

		watch: {
			"accessType": function (value, oldValue) {
				if (value == "") {
					this.access = []
					this.accessRole = []
					this.accessPermission = []
				}
			},

			"accessRole": function (value, oldValue) {
				this.access = value
			},

			"accessPermission": function (value, oldValue) {
				this.access = value
			},

			"permissionData": function (value, oldValue) {
				var permissions = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name', 'display_name'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					local: value
				})

				$('.js-permissions').tagsinput({
					itemValue: 'name',
					itemText: 'display_name',
					tagClass: 'label label-default',
					freeInput: false,
					typeaheadjs: {
						name: 'permissions',
						source: permissions,
						display: 'display_name'
					}
				})
			}
		}
	}
</script>