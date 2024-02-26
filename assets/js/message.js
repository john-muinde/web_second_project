window.onload = () => {
  const toaster = new ToasterUi();

  const options = {
    duration: 3000,
    // styles: {
    //   backgroundColor: "#ff0000",
    //   color: "#ffffff",
    //   border: "1px solid #ffffff",
    // },
  };

  toaster.error = (message) => {
    toaster.addToast(message, "error", options);
  };
  toaster.success = (message) => {
    toaster.addToast(message, "success", options);
  };

  console.log("Message.js loaded");
  window.toaster = toaster;
};
