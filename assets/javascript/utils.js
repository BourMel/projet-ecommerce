
/**
 * Returns true if email address is valid
 * Params:
 * email (string)
 */
function validateEmail(email) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(String(email).toLowerCase());
}

/**
 * Do the same as ParseFloat, but works with a ',' instead of a point in the number
 * params:
 * string
 */
function parseFloatString(string) {
    return parseFloat(string.replace(",", "."));
}