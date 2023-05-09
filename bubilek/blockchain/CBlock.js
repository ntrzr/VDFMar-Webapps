const sha256 = require('crypto-js/sha256')

class CBlock {
    constructor(id = 0, prevHash = null, data) {
        this.id = id;
        this.previousHash = prevHash;
        this.hash = this.genHash();
        this.data = data;
        this.timestamp = new Date();
    }

    genHash() {
        return sha256(this.id + this.prevHash + JSON.stringify(this.data) + this.timestamp).toString()
    }
}

module.exports = CBlock;