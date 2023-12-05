<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<form id="fileUpload" method="post">
    @csrf
    <label>select file</label>
    <input type="file" name="file" />
    <br>
    <button type="submit">Upload</button>
    <span id="error"></span>
</form>

<script>
    $(document).ready(function(){
        $("#fileUpload").submit(function(e){
            e.preventDefault();//This line prevents the default form submission behavior. The form data will be submitted asynchronously using Ajax, and this prevents the normal page reload.

            $("#error").text('');//clear any previous error messages before a new form submission.

            var formData = new FormData(this);//FormData is used to capture key/value pairs representing form fields and their values, allowing you to send them easily in an Ajax request.

            $.ajax({
                type: "POST",
                url: "{{route('file.store')}}",
                data: formData,//Specifies the data to be sent (the formData object).
                contentType: false,
                processData: false,
                success:(response)=>{
                    if(response){
                        this.reset();
                        alert("File Upload Successfully");
                    }
                },
                error:(response)=>{
                    $("#error").text(response.responseJSON.message);
                }
            });
        });
    });
</script>
