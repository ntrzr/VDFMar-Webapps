const CBlock = require("./CBlock");

class CBlockChain {

    constructor() {
        this.blocks = [];
    }

    addBlock(_block) {
        const id = this.blocks.length;
        const prevHash = this.blocks.length ? this.getLastBlock().hash : null;
        const block = new CBlock(id, prevHash, _block.data);

        this.blocks.push(block);
    }

    getBlock(id) {
        return this.blocks.length ? this.blocks[id] : null;
    }

    getLastBlock() {
        return this.blocks.length ? this.blocks[this.blocks.length - 1] : null;
    }

    isValid() {
        for (var i = 0; i < this.blocks.length; i++) {
            const curBlock = this.blocks[i];
            const prevBlock = this.blocks[i - 1];

            if (i !== 0) {
                if (curBlock.previousHash !== prevBlock.hash) {
                }
            }
        }
        return true
    }
}

module.exports = CBlockChain;