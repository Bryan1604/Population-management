cuteAlert({
    type: "question",
    title: "Confirm Title",
    message: "Confirm Message",
    confirmText: "Okay",
    cancelText: "Cancel"
  }).then((e)=>{
    if ( e == ("Thanks")){
  } else {
      alert(":-(");
    }
  })