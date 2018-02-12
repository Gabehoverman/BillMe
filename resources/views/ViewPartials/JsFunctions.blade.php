<script>
        function removeItem(id, type) {
            alert(id);
            var row = document.getElementById(id);
            $.ajax({
                url: 'http://127.0.0.1:8000/app/data/delete',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    id: id,
                    user: "{{ Auth::user()->id }}",
                    type: type
                },
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function( data, textStatus, jQxhr ){
                    console.log(data);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
                
            })
            row.remove();
        };
        
        function fetch() {
            fetch('http://127.0.0.1:8000/app/bills/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify(data),
                data: JSON.stringify(data)
            })
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
            })
            row.remove();
        };
    </script>