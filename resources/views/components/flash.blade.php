@if(session()->has('success'))
    <p id="flash" v-show="success" class="bg-blue-500 bottom-2 fixed px-4 py-2 right-2 rounded-3xl text-white">{{session('success')}}</p>
@endif

<script>
    new Vue({
            el: "#flash",
            data: {
                'success': true
            },
            created: function () {
                setTimeout(() => this.success = false, 4000)
            }
        }
    )
</script>
