<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodalLabel">Login into your account </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="partials/handle_login.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter your username </label>
                        <input type="text" name="uname"  class="form-control" id="uname" aria-describedby="emailHelp">
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter your Password</label>
                        <input type="password" name="password"  class="form-control" id="password">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
</div>