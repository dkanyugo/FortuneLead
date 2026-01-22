console.log("running");
const parentElement = document.getElementById("NotificationCenter");

// Configure and create an observer
const observer = new MutationObserver(function (mutations) {
  mutations.forEach(function (mutation) {
    if (mutation.addedNodes) {
      mutation.addedNodes.forEach(function (node) {
        if (node.id === "Notification") {
          console.log("Detected");
          setTimeout(() => {
            console.log("Ejected");
            node.style.display = "none";
          }, 3000);
        }
      });
    }
  });
});

// Start observing the parent element for child additions
observer.observe(parentElement, { childList: true, subtree: true });
