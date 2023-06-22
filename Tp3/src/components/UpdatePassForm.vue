<template>
    <div>
        <form>
            <div class="form-group">
                <label for="inputNewPass">New Password</label>
                <input type="password" class="form-control" id="inputNewPass" aria-describedby="emailHelp" placeholder="Enter New Password">
            </div>
            <div class="form-group">
                <label for="inputConfirmPass">Confirm Password</label>
                <input type="password" class="form-control" id="inputConfirmPass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" @click="updatePass">Submit</button>
            <span id="errMsg"></span>
        </form>
    </div>
</template>

<script>
    import { patchPassword} from "@/services/APIServices.js"

    export default {
        methods: {
            checkPassMatch() {
                let pass = document.getElementById("inputNewPass").value;
                let confPass = document.getElementById("inputConfirmPass").value;
                let errMsg = document.getElementById("errMsg");
                let error = false;

                if(pass != confPass) {
                    error = true;
                    errMsg.innerHTML = "Password does not match";
                    errMsg.classList.add("text-danger");
                }
                else {
                    error = false;
                }
                return error;
            },
            updatePass(){
                let error = this.checkPassMatch();
                let errMsg = document.getElementById("errMsg");
                let pass = document.getElementById("inputNewPass").value;
                if(!error){
                    patchPassword(pass, this.$route.params.id).then(rsponse => {
                        if(response.ok){
                            errMsg.innerHTML = "Your password has been updated";
                            errMsg.classList.add("text-success");
                        }
                        else{
                            errMsg.innerHTML = "An error occured";
                            errMsg.classList.add("text-danger");
                        }
                    });
                }
            }
        },
    }
</script>

<style scoped>

</style>