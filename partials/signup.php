<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup into Areeb's Forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="partials/handle_signup.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Create your username :</label>
                        <input type="text"  name="uname" class="form-control" id="uname" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Create your Password</label>
                        <input type="password" class="form-control" id="password" name ="password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Re-enter your Password</label>
                        <input type="password" class="form-control" id="password" name ="password2">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
</div>