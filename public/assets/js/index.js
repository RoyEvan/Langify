const select = (el, all = false) => {
    el = el.trim();
    if (all) {
        return [...document.querySelectorAll(el)];
    } else {
        return document.querySelector(el);
    }
};



//  SIDEBAR MOBILE
let sidebarToggle = select("#sidebartoggle");
let sidebar = select(".sidebar");
let accountDetailBox = select(".account-details");

function toggleSidebar() {
    if (sidebar.offsetWidth <= 10) {
        sidebar.style.width = "72vw";
        bodyElement.style.overflow = "hidden";
        accountDetailBox.style.whiteSpace = "unset";
    } else {
        sidebar.style.width = "0px";
        bodyElement.style.overflow = "auto";
        accountDetailBox.style.whiteSpace = "nowrap";
    }
}

let content = select(".content");
content.addEventListener("touchstart", (evt) => {
    sidebar.style.width = "0px";
    bodyElement.style.overflow = "auto";
});



// MODAL


//open modal
let allOpenModalButton = select(".button-open-modal", all = true);


allOpenModalButton.forEach(element => {
    element.addEventListener("click", (evt) => {
        let idTargetModal = element.getAttribute("target-modal");
        let correspondingModalBox = document.getElementById(idTargetModal);
        correspondingModalBox.style.display = "flex";
        correspondingModalBox.classList.add("open");
    });
});

//close modal
let allCloseModalButton = select(".button-close-modal", all = true);


allCloseModalButton.forEach(element => {
    element.addEventListener("click", (evt) => {
        let idTargetModal = element.getAttribute("target-modal");
        let correspondingModalBox = document.getElementById(idTargetModal);
        correspondingModalBox.style.display = "none";
        correspondingModalBox.classList.remove("open");
    });
});



//  NAVS & TABS

let allLinkTabs = select(".tabs-item", all = true);

allLinkTabs.forEach(element => {
    element.addEventListener("click", (evt) => {
        parentID = evt.target.parentElement.id
        openTabs(parentID, evt.target)
    });
});

function openTabs(parentID, child) {
    // Select Parent ID
    let parentTabsNav = select(`#${parentID}`)
    let parentTabsContent = select(`#${parentID.replace('nav', 'content')}`)

    select(`#${parentID} > .tabs-item`, all = true).forEach(element => {
        element.classList.remove("active")
    });

    select(`#${parentID.replace('nav', 'content')} > .tab-content`, all = true).forEach(element => {
        element.classList.remove("active")
    });

    let idClicked = Array.prototype.indexOf.call(parentTabsNav.children, child)

    parentTabsNav.children[idClicked].classList.add("active")
    parentTabsContent.children[idClicked].classList.add("active")
}
