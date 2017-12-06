new Vue	({
	el:'#content_menu',
	data : {
		foods:[],
		drinks:[],
		last_page_food:0,
		last_page_drink:0,
		current_page_food:1,
		current_page_drink:1,
		url:"http://localhost:8000/img/"

	},
	mounted :function(){
		this.show_food();
		this.show_drink();
	},
	methods: {
		show_food :function($pageNo){
			var authOptions = {
                method: 'get',
                url: '/api/v1/foods?page='+$pageNo,
                json: true,
            }
            axios(authOptions).then(response => {
                this.$set(this, 'foods', response.data.data);
                this.current_page_food = response.data.current_page;
                this.last_page_food = response.data.last_page;
                console.log(this.foods);
            });
		},
		show_drink :function($pageNo){
			var authOptions = {
                method: 'get',
                url: '/api/v1/drinks?page='+$pageNo,
                json: true,
            }
            axios(authOptions).then(response => {
                this.$set(this, 'drinks', response.data.data);
                this.current_page_drink = response.data.current_page;
                this.last_page_drink = response.data.last_page;
                console.log(this.drinks);
            });
		},
	}
})