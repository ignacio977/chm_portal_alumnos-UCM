function OnChangeCheckbox (CheckBoxId) {
    var SplitBox = CheckBoxId.split("][");
    SplitBox[1] = SplitBox[1].split("]");
    SplitBox.splice(1, 0, "][");
    SplitBox.splice(3, 1, "]");
    for (var i = 1;i <= 5; i++)
    {
      document.getElementById(SplitBox[0]+SplitBox[1]+i+SplitBox[3]).checked = false;
    }
    document.getElementById(CheckBoxId).checked = true;
  }