var manage_drink = new Vue	({
	el:'#manage_drink',
	data : {
		drinks:[],
		url:"http://localhost:8000/img/",
	},
	computed: {
	},
	mounted :function(){
		this.show_drink();
	},
	methods: {
		show_drink :function(){
			var authOptions = {
                method: 'get',
                url: '/api/v1/all_drinks',
                json: true,
            }
            axios(authOptions).then(response => {
                this.$set(this, 'drinks', response.data);
                console.log(this.drinks);
            });
		},
	}
})