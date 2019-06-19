var mongoose = require('mongoose');

var userSchema = mongoose.Schema({
    name: {
        type: String,
        required: true
    },
    email: {
        type: String,
        required: true
    },
    password: {
        type: String,
        required: true
    },
    token: String,
    token_expires_on: {
        type: Date
    }
});

class UserClass {
    // Check if the password matches with the one of the user.
    matchesPassword(password) {
        return this.password == password;
    }

    // Return the token (Renew it if necessary).
    getToken() {
        if (!this.hasValidToken()) {
            this.renewToken();
        }
        return this.token;
    }

    // Check is the token has expired or not.
    hasValidToken() {
        var today = new Date();
        var now = today.getFullYear() + '-' 
                    + ((today.getMonth() + 1).toString().length == 1 ? "0"+(today.getMonth() + 1) : (today.getMonth() + 1)) + '-' 
                    + today.getDate() + "T" 
                    + (today.getHours().toString().length == 1 ? "0"+today.getHours() : today.getHours()) + ":" 
                    + (today.getMinutes().toString().length == 1 ? "0"+today.getMinutes() : today.getMinutes()) + ":" 
                    + today.getSeconds().toString().length == 1 ? "0"+today.getSeconds() : today.getSeconds();
        return new Date(now) < new Date(this.token_expires_on);
    }

    // Renew and save the token.
    renewToken() {
        // Generate token.
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = 19;
        for ( var i = 0; i < charactersLength; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        this.token = result;
        // Generate expiration date.
        var today = new Date();
        this.token_expires_on = today.getFullYear() + '-' 
            + ((today.getMonth() + 1).toString().length == 1 ? "0"+(today.getMonth() + 1) : (today.getMonth() + 1)) + '-' 
            + today.getDate() + "T" 
            + (today.getHours().toString().length == 1 ? "0"+today.getHours() + 1 : today.getHours() + 1) + ":" 
            + (today.getMinutes().toString().length == 1 ? "0"+today.getMinutes() : today.getMinutes()) + ":" 
            + today.getSeconds();
        // Save the new token and expiration date on the user.
        this.save();
    }
}

userSchema.loadClass(UserClass);

var User = module.exports = mongoose.model('user', userSchema);
module.exports.get = function (callback, limit) {
    User.find(callback).limit(limit);
}