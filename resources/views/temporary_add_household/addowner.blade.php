<h1>Add owner in4</h1>

<form action="/add_person_form" method="POST">
  @csrf
  <input type="hidden" name="household_id" value={{$highestID}}>
  <input type="hidden" name="isOwner" value={{$isOwner}}>
  <table border="1">
    <tr>
      <td>Name</td>
      <td>Sex</td>
      <td>Birthday</td>
      <td>Place of birth</td>
      <td>Ethnic</td>
      <td>Job</td>
      <td>Office</td>
      <td>Identity number</td>
    </tr>

    <tr>
      <td> <input type="text" name="full_name" placeholder="Enter full_name"> </td>
      <td>
        <input type="radio" name="sex" value="male"> Male <br> 
        <input type="radio" name="sex" value="female"> Female <br> 
      </td>
      <td><input type= "date" name="birthday" placeholder="Enter birthday"></td>
      <td><input type= "text" name="place_of_birth" placeholder="Enter place of birth"></td>
      <td><input type= "text" name="ethnic" placeholder="Enter ethnic"></td>
      <td><input type= "text" name="job" placeholder="Enter job"></td>
      <td><input type= "text" name="office" placeholder="Enter office"></td>
      <td><input type= "text" name="identify_number" placeholder="Enter identify_number"></td>
    </tr>
 
    <tr>
      <td>Received_IDCard_place</td>
      <td>Received_IDCard_time</td>
      <td>Phone_number</td>
      <td>Domicile</td>
      <td>Address_before</td>
      <td>Household_owner_relationship</td>
      <td>State <br> 0: có hộ khẩu <br> 1: tạm vắng <br> 2: người tạm trú</td>
      <td>Note</td>
    </tr>

    <tr>
      <td><input type= "text" name="received_IDCard_place" placeholder="Enter received_IDCard_place"></td>
      <td><input type= "date" name="received_IDCard_time" placeholder="Enter received_IDCard_time"></td>
      <td><input type= "text" name="phone_number" placeholder="Enter phone number"></td>
      <td><input type= "text" name="domicile" placeholder="Enter domicile"></td>
      <td><input type= "text" name="address_before" placeholder="Enteraddress_before"></td>
      <td><input type= "text" name="household_owner_relationship" placeholder="Enter household_owner_relationship"></td>
      <td><input type= "number" name="state" placeholder="Enter state"></td>
      <td><input type= "text" name="note" placeholder="Enter note"></td>
    </tr>
  </table>
 
  <button type="submit">Add owner</button>

  

</form>