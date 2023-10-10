@include('layouts/header')
<div class="container">
    <div class="row vh-100 justify-content-center">
        <div class="col-5 align-self-center border p-3">
            <form method="post">
                <div class="form-group">
                    <div class="col-12 text-center">
                        <label id="invalid" class="text-danger d-none"></label>
                        </div>
                        <label for="user_email">Email address for Recovery Link</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp" placeholder="Enter email">
                        <div class="col-12 text-end mt-1">
                            <strong><a href="/">Back To Login</a></strong>
                        </div>
                        <div class="mt-2">
                            <button id="emailBtn" type="button" onclick="sendlink()" class="btn btn-info">Send Link</button>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

