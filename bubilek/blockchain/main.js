const Blockchain = require("./CBlockChain")

const blockChain = new Blockchain()
blockChain.addBlock({ data: "zzz" })
blockChain.addBlock({ data: "axaxa" })

console.log(blockChain)
console.log(blockChain.isValid())