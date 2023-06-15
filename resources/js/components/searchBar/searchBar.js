const searchBar = document.querySelector('input[name="search"]')
const searchForm = document.querySelector('.js-search-form')
const searchResult = document.querySelector('.js-search-result')



const suggest = () => {
    searchForm.addEventListener('submit', evt => evt.preventDefault())
    const searchBar = searchForm.querySelector('input[name="search"]')
    searchBar.addEventListener('input', evt => {
        if (!evt.currentTarget.value) return
        const formData = new FormData(searchForm)
        const request = JSONData(formAction, setDataPOST(formData))
        request.then(renderSearchResult)
    })
}

function renderSearchResult (json) {
    const options = json.map(value => createOption(value.name))
    searchResult.replaceChildren(...options)
}

const resetSearchSuggestion = () => searchResult.replaceChildren([...options])


const createOption = string => {
    const option = document.createElement("option")
    option.value = string
    return option
}

const formAction = searchForm.action 
const setDataPOST = (body)=> { 
    return {
        method: "POST",
        headers: {
            accept: "application/json"
        },
        body: body
    }
}

async function logJSONData (url, data) {
    const response = await fetch(url, data)
    const jsonData = await response.json()
    console.log(jsonData);
}

async function JSONData (url, data) {
    const response = await fetch(url, data)
    const jsonData = await response.json()
    return Object.values(JSON.parse(jsonData)).map(value => value)
}

suggest ()
export function test () {}