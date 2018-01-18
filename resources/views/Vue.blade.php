<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel React application</title>
    </head>
    <body>
    <h2 style="text-align: center">Laravel and Vue </h2>
        <div id="app">
            <h2 v-text="message"></h2>
            <maintenance :maintenance="maintenance"/>
            <example msg="hello" />
        </div>@include('viewpartials/button')

 
        

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script>

            Vue.component('maintenance', {
                props: ['maintenance'],
                data: {
                    maintenance: ''
                },
                methods: {
                    update: function() {
                        alert(this.m);
                    }
                },
                template: `
                <div>
                    <div v-for="m in maintenance">
                        <p v-text='m.notes'></p>
                        <button v-on:click="update">Delete Me</button>
                    </div>
                </div>
                `,
            })

                Vue.component('example', {
                    props:['msg'],
                    template:`<div>
                        <h2 v-text='msg'></h2>
                    </div>
                    ` ,

                  })

             var app = new Vue({
                el: '#app',
                data: {
                    message: 'hello world',
                    msg: '',
                    maintenance:'',
                },
                methods: {
                    Fetch: function(url) {
                        console.log(url);
                        fetch(url)
                        .then((res) => res.json())
                        .then((data) =>  {
                            console.log(data.maintenance)
                            return(data.maintenance);
                        })
                    },
                    fetchMaintenance: function() {
                        url = "http://127.0.0.1:8000/Maintenance"
                        fetch(url)
                        .then((res) => res.json())
                        .then((data) =>  {
                            console.log(data.maintenance)
                            this.maintenance = data.maintenance;
                        })
                    }
                },
                mounted: function() {
                    this.fetchMaintenance();
                },
            })
        </script>
        
       
    </body>
</html>