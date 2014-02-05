/* Javascripts Document */
function hashTable() {
    this.data = new Object();
    this.put = function(key,value) {
        this.data[key] = value;
    }
    this.get = function(key) {
        return this.data[key] || -1;
    }
}
