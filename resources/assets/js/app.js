
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */



Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

var app = new Vue({
    el: '#main',
    data: { 
        searchString: "",
        articles: [],
        items: [],
    },
    created: function() {
        this.fetchData();
    },
    methods: {
        fetchData: function () {
            this.$http.get('api/items').then((response) => {
                this.articles = response.body;
            }, (response) => { 
                return false;
            });
        },
        addItem: function (article) {
            var found = false;

            /*for (var i = 0; i < this.items.length; i++) {
                if (this.items[i].article === article) {
                    this.items[i].numberOfItems++;
                    found = true;
                    break;
                }
            }*/

            if (!found) {
                this.items.push({   id: article.id,
                                    tracking_number: article.tracking_number,
                                    item_name: article.item_name,
                                    description: article.description,
                                    buying_price: article.buying_price,
                                    quantity: 1,
                                    numberOfItems: 1 
                                });

                this.$http.set('api/receivingitems', this.items ).then(response => {

                    // get status
                    response.status;

                }, response => {
                    // error callback
                });

            }
        },
        removeItem: function(article) {
            for (var i = 0; i < this.items.length; i++) {
                if (this.items[i] === article) {
                    this.items.splice(i, 1);
                    break;
                }
            }
        }
    },    
    computed: {
        filteredArticles: function () {
            var articles_array = this.articles,
                searchString = this.searchString;

            if(!searchString){
                return articles_array;
            }

            searchString = searchString.trim().toLowerCase();

            articles_array = articles_array.filter(function(item){
                if(item.item_name.toLowerCase().indexOf(searchString) !== -1){
                    return item;
                }
            })

            // Return an array with the filtered data.
            return articles_array;;
        },

        subtotal: function() {
            var subtotal = 0;

            this.items.forEach(function(item){
                subtotal += item.buying_price * item.quantity;

            });


            return subtotal;

       },

    }
}); 


