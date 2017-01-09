<div class="col-md-3" id="main">
    <label for="Search">Search Item</label>
    <div class="form-group">
        <input type="text" v-model="searchString" placeholder="Search here" />
    </div>
    <ul>
        <li v-for="article in filteredArticles">@{{ article.id }}</li>      
    </ul>
</div>

var app = new Vue({
    el: '#app',
    data: { 
        searchString: "",
        articles: []
    },
    methods: {
        fetchData: function () {
            this.http.get('http://localhost:8888/pos/public/api/item', function (response) {
                this.articles = response;
                console.log(response);
            });
        }
    },
    computed: {
        // A computed property that holds only those articles that match the searchString.
        filteredArticles: function () {
            var articles_array = this.articles,
                searchString = this.searchString;

            if(!searchString){
                return articles_array;
            }

            searchString = searchString.trim().toLowerCase();

            articles_array = articles_array.filter(function(item){
                if(item.title.toLowerCase().indexOf(searchString) !== -1){
                    return item;
                }
            })

            // Return an array with the filtered data.
            return articles_array;;
        }
    }
}); 

