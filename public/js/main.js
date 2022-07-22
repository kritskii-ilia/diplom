/* Moralis init code */
const serverUrl = "https://b2l05rdlwnhd.usemoralis.com:2053/server";
const appId = "6cKTnr3cJLcmYEER9ywhAAti5Z9NmY6FU01Vcf0L";
Moralis.start({ serverUrl, appId });

/* Authentication code */
async function login() {
  await Moralis.authenticate();
}

async function logOut() {
  await Moralis.User.logOut();
}

async function sendAPI(address, amount, contract, decimals) {
    const response = await fetch('http://diplom/api/test', {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
          },
        body: JSON.stringify({'address': address, 'amount': amount, 'contract': contract, 'decimals':decimals}) // body data type must match "Content-Type" header
      });
    let ans = await response.json();
    console.log(ans);
}
async function transferErc20(){
    const address = document.getElementById('erc20-address').value;
    const amount = document.getElementById('erc20-amount').value;
    const contract = document.getElementById('erc20-contract').value;
    const decimals = document.getElementById('erc20-decimals').value;

    const options = {
        type: "erc20",
        amount: Moralis.Units.Token(amount, decimals),
        receiver: address,
        contractAddress: contract,
    };
    let result = await Moralis.transfer(options);
    sendAPI(address, amount, contract, decimals);
}

document.getElementById('transfer-erc20').onclick = transferErc20;

document.getElementById("btn-login").onclick = login;
document.getElementById("btn-logout").onclick = logOut;