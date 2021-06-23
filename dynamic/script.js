
      $("#whole").ready(function()
      {
        var a = 1;
        var b = 1;
        var c = 1;
        
              $('input[type="file"]').on('change', function ()
                { 
                  this.select();
                  var reader = new FileReader();
                  if(this.files[0].size>528385)
                  {
                    alert("Image Size should not be greater than 500Kb");
                    $(this).attr("src","blank");
                    $(this).attr("value","");
                    $(this).wrap('<form>').closest('form').get(0).reset();
                    $(this).unwrap();     
                    return false;
                  }
                  if(this.files[0].type.indexOf("image")==-1)
                  {
                    alert("Invalid Type");
                    $(this).attr("src","blank");
                    $(this).attr("value","");  
                    $(this).wrap('<form>').closest('form').get(0).reset();
                    $(this).unwrap();         
                    return false;
                  }   

              });

             $("#candidate_details").on('click','#save',function()
             {
                
                var isFormValid = true;

                $("#step-1 input").each(function()
                {
                        if ($.trim($(this).val()).length == 0)
                        {
                            $(this).addClass("highlight");
                            isFormValid = false;
                            $(this).focus();
                        }
                        else
                        {
                            $(this).removeClass("highlight");
                        }
                });

                if (isFormValid) 
                {   
                    $("#step-2 input").each(function()
                      {
                              if ($.trim($(this).val()).length == 0)
                              {
                                  $(this).addClass("highlight");
                                  isFormValid = false;
                                  $(this).focus();
                              }
                              else
                              {
                                  $(this).removeClass("highlight");
                              }
                      });

                      if (isFormValid) 
                      {   
                          $("#step-3 input").each(function()
                          {
                            if($(this).prop('required'))
                            {
                                
                                  if ($.trim($(this).val()).length == 0)
                                  {
                                      $(this).addClass("highlight");
                                      isFormValid = false;
                                      $(this).focus();
                                  }
                                  else
                                  {
                                      $(this).removeClass("highlight");
                                  }
                              }
                          });

                          if (isFormValid) 
                          {   
                              $("#step-4 input").each(function()
                              {
                                      if ($.trim($(this).val()).length == 0)
                                      {
                                          $(this).addClass("highlight");
                                          isFormValid = false;
                                          $(this).focus();
                                      }
                                      else
                                      {
                                          $(this).removeClass("highlight");
                                      }
                              });

                              if (isFormValid) 
                              {   
                                  $("#step-5 input").each(function()
                                  {
                                          if ($.trim($(this).val()).length == 0)
                                          {
                                              $(this).addClass("highlight");
                                              isFormValid = false;
                                              $(this).focus();
                                          }
                                          else
                                          {
                                              $(this).removeClass("highlight");
                                          }
                                  });

                                  if (isFormValid) 
                                  {   
                                      $("#step-6 input").each(function()
                                      {
                                              if ($.trim($(this).val()).length == 0)
                                              {
                                                  $(this).addClass("highlight");
                                                  isFormValid = false;
                                                  $(this).focus();
                                              }
                                              else
                                              {
                                                  $(this).removeClass("highlight");
                                              }
                                      });

                                      if (isFormValid) 
                                      {   
                                          alert("Validation Successful");
                                          
                                          window.location.href='save_details.php?id=<?php echo $id;?>';
                                          break;
                                      }
                                      else
                                      {
                                          $("#candidate_details").submit(function(e){
                                              
                                              e.preventDefault(e);
                                          });
                                          alert("Please fill in all the required fields (indicated by *) in Section 6.");
                                      }
                                  }
                                  else
                                  {
                                      $("#candidate_details").submit(function(e){
                                          
                                          e.preventDefault(e);
                                      });
                                      alert("Please fill in all the required fields (indicated by *) in Section 5.");
                                  }
                              }
                              else
                              {
                                  $("#candidate_details").submit(function(e){
                                      
                                      e.preventDefault(e);
                                  });
                                  alert("Please fill in all the required fields (indicated by *) in Section 4.");
                              }
                          }
                          else
                          {
                              $("#candidate_details").submit(function(e){
                                  
                                  e.preventDefault(e);
                              });
                              alert("Please fill in all the required fields (indicated by *) in Section 3.");
                          }
                      }
                      else
                      {
                          $("#candidate_details").submit(function(e){
                              
                              e.preventDefault(e);
                          });
                          alert("Please fill in all the required fields (indicated by *) in Section 2.");
                      }
                     
                      
                }
                else
                {
                    $("#candidate_details").submit(function(e){
                        
                        e.preventDefault(e);
                    });
                    alert("Please fill in all the required fields (indicated by *) in Section 1.");
                }
                

              });
              

             $("#step-2").on('click','#add1',function()
             {
                var html1 = '<div class="opening"><table><tr><td style="width:50%"><hr/></td><td style="vertical-align:middle;"></td><td style="width:50%"><hr/></td></tr></table><h4><center>Additional Form ['+a+']</center></h4><table><tr><td style="width:50%"><hr/></td><td style="vertical-align:middle;"></td><td style="width:50%"><hr/></td></tr></table><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="institute-name">Select the type of education details: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><select id="education_type" name="education_type[]" class="form-control" required="required"><option value="Secondary">Secondary Education</option><option value="Senior Secondary">Senior Secondary Education</option><option value="Graduation">Graduate Education</option><option value="Post Graduation">Post Graduate Education</option><option value="Doctorate">Doctorate Education</option></select></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="institute-name">Name of the Institute/School/College: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="instituteName[]" required="required" class="form-control" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")"></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="university-name">Board/University: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="universityName[]" required="required" class="form-control " maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")"></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="duration">Duration of Study (specify month & year): <span class="required">*</span></label><div class="col-md-2 col-sm-6 "><input type="number" name="duration[]" required="required" class="form-control ">Months &nbsp;</div><div class="col-md-2 col-sm-6 "><input type="number"  name="duration1[]" required="required" class="form-control "> Years</div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="division">Division/Class/% : <span class="required">*</span></label><div class="col-md-2 col-sm-6 "><input type="text" name="division[]" required="required" class="form-control  " ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="degree-obtained">Degree Obtained : <span class="required">*</span></label><div class="col-md-6 col-sm-6"><p style="margin-top:8px;">Yes:<input type="radio" class="flat" name="obtained['+a+']" value="yes" required="required" /> &nbsp; No:<input type="radio" class="flat" name="obtained['+a+']"  value="no" /></p></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="course-type">Course Type: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><p style="margin-top:8px;">Regular:<input type="radio" class="flat" name="course_type['+a+']" value="regular" required="required" /> &nbsp; Distance:<input type="radio" class="flat" name="course_type['+a+']" value="distance" /></p></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="major">Majored in:<span class="required">*</span></label><div class="col-md-3 col-sm-6 "><input type="text" name="major[]" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="roll-no">Student ID/Enrolment/Registration/Roll No: <span class="required">*</span></label><div class="col-md-3 col-sm-6 "><input type="text" name="roll_no[]" required="required" class="form-control  "></div></div><br><h4><center>Address of Institute/School/College</center></h4><br><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="building-no">Building No & Street: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><textarea class="form-control" name="building_no[]" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity("Only alphanumeric characters with (-)&(,)&(.) is allowed.")" oninput="this.setCustomValidity("")" required="required" ></textarea></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="city">City: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control"  name="city[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="state">State: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control"  name="state[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="pin">PIN: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control" name="pin[]" maxlength="10" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="landline">Landline: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control" name="landline[]" maxlength="15" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="mark-sheets">Mark Sheets: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="file" accept="image/*" name="mark_sheets[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="degree-certificate">Degree Certificate: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="file" accept="image/*" name="degree_certificate[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="provisional-degree">Provisional Degree certificate: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="file" accept="image/*" name="provisional_degree[]" required="required"></div></div><div class="row" style="margin-top:40px;"><div class="col-md-2 offset-md-10"><input type="button" name="remove" id="remove" value="Remove"  class="btn btn-danger btn-lg" style=" padding: 12px;width: 154px;border-radius: 10px;"></div></div></div>';

                var isFormValid = true;

                $("#step-2 input").each(function()
                {
                        if ($.trim($(this).val()).length == 0)
                        {
                            $(this).addClass("highlight");
                            isFormValid = false;
                            $(this).focus();
                        }
                        else
                        {
                            $(this).removeClass("highlight");
                        }
                });

                if (isFormValid) 
                {   
                    a++;
                    $("#001").append(html1);
                }
                else
                {
                    alert("Please fill in all the required fields (indicated by *) and then click on Add More button");
                }

              });
             

             $("#001").on('click','#remove',function()
             {
                a--;
                $(this).closest('.opening').remove();
              });
             
             $("#step-3").on('click','#add2',function()
             {
                var html2 = '<div class="opening"><table><tr><td style="width:50%"><hr/></td><td style="vertical-align:middle;"></td><td style="width:50%"><hr/></td></tr></table><h4><center>Additional Form ['+b+']</center></h4><table><tr><td style="width:50%"><hr/></td><td style="vertical-align:middle;"></td><td style="width:50%"><hr/></td></tr></table><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="company-name">Name of Company: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="comapany_name[]" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="employee-id">Employee ID: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="employee_id[]" required="required" class="form-control "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="period-of-employment">Period of Employment (specify month & year): <span class="required">*</span></label>&nbsp; From: <div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]1" required="required" class="form-control "> Months &nbsp;</div><div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]2" required="required" class="form-control "> Years &nbsp;</div> &nbsp; &nbsp;&nbsp;&nbsp;To:<div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]3" required="required" class="form-control "> Months &nbsp;</div><div class="col-md-1 col-sm-6 "><input type="number" name="employment_period[]4" required="required" class="form-control "> Years &nbsp;</div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="designation-department">Designation & Department : <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="designation_department[]" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="last-drawn-salary">Last drawn salary (CTC): <span class="required">*</span></label><div class="col-md-2 col-sm-6 "><select name="salary1[]" class="form-control" required="" ><option value="">---</option><option value="AED">UAE Dirham</option><option value="AFN">Afghan afghani</option><option value="ALL">Albanian lek</option><option value="AMD">Armenian dram</option><option value="AOA">Angolan kwanza</option><option value="ARS">Argentine peso</option><option value="AUD">Australian dollar</option><option value="AWG">Aruban florin</option><option value="AZN">Azerbaijani manat</option><option value="BAM">Bosnia and Herzegovina convertible mark</option><option value="BBD">Barbadian dollar</option><option value="BDT">Bangladeshi taka</option><option value="BGN">Bulgarian lev</option><option value="BHD">Bahraini dinar</option><option value="BIF">Burundian franc</option><option value="BMD">Bermudian dollar</option><option value="BND">Brunei dollar</option><option value="BOB">Bolivian boliviano</option><option value="BRL">Brazilian real</option><option value="BSD">Bahamian dollar</option><option value="BTN">Bhutanese ngultrum</option><option value="BWP">Botswana pula</option><option value="BYR">Belarusian ruble</option><option value="BZD">Belize dollar</option><option value="CAD">Canadian dollar</option><option value="CDF">Congolese franc</option><option value="CHF">Swiss franc</option><option value="CLP">Chilean peso</option><option value="CNY">Chinese yuan</option><option value="COP">Colombian peso</option><option value="CRC">Costa Rican colón</option><option value="CUP">Cuban convertible peso</option><option value="CVE">Cape Verdean escudo</option><option value="CZK">Czech koruna</option><option value="DJF">Djiboutian franc</option><option value="DKK">Danish krone</option><option value="DOP">Dominican peso</option><option value="DZD">Algerian dinar</option><option value="EGP">Egyptian pound</option><option value="ERN">Eritrean nakfa</option><option value="ETB">Ethiopian birr</option><option value="EUR">Euro</option><option value="FJD">Fijian dollar</option><option value="FKP">Falkland Islands pound</option><option value="GBP">British pound</option><option value="GEL">Georgian lari</option><option value="GHS">Ghana cedi</option><option value="GMD">Gambian dalasi</option><option value="GNF">Guinean franc</option><option value="GTQ">Guatemalan quetzal</option><option value="GYD">Guyanese dollar</option><option value="HKD">Hong Kong dollar</option><option value="HNL">Honduran lempira</option><option value="HRK">Croatian kuna</option><option value="HTG">Haitian gourde</option><option value="HUF">Hungarian forint</option><option value="IDR">Indonesian rupiah</option><option value="ILS">Israeli new shekel</option><option value="IMP">Manx pound</option><option value="INR">Indian rupee</option><option value="IQD">Iraqi dinar</option><option value="IRR">Iranian rial</option><option value="ISK">Icelandic króna</option><option value="JEP">Jersey pound</option><option value="JMD">Jamaican dollar</option><option value="JOD">Jordanian dinar</option><option value="JPY">Japanese yen</option><option value="KES">Kenyan shilling</option><option value="KGS">Kyrgyzstani som</option><option value="KHR">Cambodian riel</option><option value="KMF">Comorian franc</option><option value="KPW">North Korean won</option><option value="KRW">South Korean won</option><option value="KWD">Kuwaiti dinar</option><option value="KYD">Cayman Islands dollar</option><option value="KZT">Kazakhstani tenge</option><option value="LAK">Lao kip</option><option value="LBP">Lebanese pound</option><option value="LKR">Sri Lankan rupee</option><option value="LRD">Liberian dollar</option><option value="LSL">Lesotho loti</option><option value="LTL">Lithuanian litas</option><option value="LVL">Latvian lats</option><option value="LYD">Libyan dinar</option><option value="MAD">Moroccan dirham</option><option value="MDL">Moldovan leu</option><option value="MGA">Malagasy ariary</option><option value="MKD">Macedonian denar</option><option value="MMK">Burmese kyat</option><option value="MNT">Mongolian tögrög</option><option value="MOP">Macanese pataca</option><option value="MRO">Mauritanian ouguiya</option><option value="MUR">Mauritian rupee</option><option value="MVR">Maldivian rufiyaa</option><option value="MWK">Malawian kwacha</option><option value="MXN">Mexican peso</option><option value="MYR">Malaysian ringgit</option><option value="MZN">Mozambican metical</option><option value="NAD">Namibian dollar</option><option value="NGN">Nigerian naira</option><option value="NIO">Nicaraguan córdoba</option><option value="NOK">Norwegian krone</option><option value="NPR">Nepalese rupee</option><option value="NZD">New Zealand dollar</option><option value="OMR">Omani rial</option><option value="PAB">Panamanian balboa</option><option value="PEN">Peruvian nuevo sol</option><option value="PGK">Papua New Guinean kina</option><option value="PHP">Philippine peso</option><option value="PKR">Pakistani rupee</option><option value="PLN">Polish złoty</option><option value="PRB">Transnistrian ruble</option><option value="PYG">Paraguayan guaraní</option><option value="QAR">Qatari riyal</option><option value="RON">Romanian leu</option><option value="RSD">Serbian dinar</option><option value="RUB">Russian ruble</option><option value="RWF">Rwandan franc</option><option value="SAR">Saudi riyal</option><option value="SBD">Solomon Islands dollar</option><option value="SCR">Seychellois rupee</option><option value="SDG">Singapore dollar</option><option value="SEK">Swedish krona</option><option value="SGD">Singapore dollar</option><option value="SHP">Saint Helena pound</option><option value="SLL">Sierra Leonean leone</option><option value="SOS">Somali shilling</option><option value="SRD">Surinamese dollar</option><option value="SSP">South Sudanese pound</option><option value="STD">São Tomé and Príncipe dobra</option><option value="SVC">Salvadoran colón</option><option value="SYP">Syrian pound</option><option value="SZL">Swazi lilangeni</option><option value="THB">Thai baht</option><option value="TJS">Tajikistani somoni</option><option value="TMT">Turkmenistan manat</option><option value="TND">Tunisian dinar</option><option value="TOP">Tongan paʻanga</option><option value="TRY">Turkish lira</option><option value="TTD">Trinidad and Tobago dollar</option><option value="TWD">New Taiwan dollar</option><option value="TZS">Tanzanian shilling</option><option value="UAH">Ukrainian hryvnia</option><option value="UGX">Ugandan shilling</option><option value="USD">United States dollar</option><option value="UYU">Uruguayan peso</option><option value="UZS">Uzbekistani som</option><option value="VEF">Venezuelan bolívar</option><option value="VND">Vietnamese đồng</option><option value="VUV">Vanuatu vatu</option><option value="WST">Samoan tālā</option><option value="XAF">Central African CFA franc</option><option value="XCD">East Caribbean dollar</option><option value="XOF">West African CFA franc</option><option value="XPF">CFP franc</option><option value="YER">Yemeni rial</option><option value="ZAR">South African rand</option><option value="ZMW">Zambian kwacha</option><option value="ZWL">Zimbabwean dollar</option></select></div><div class="col-md-3 col-sm-6 "><input type="number" name="salary[]" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="type-of-employment">Type of Employment : <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><p style="margin-top:8px;">Permanent:<input type="radio" class="flat" name="type_of_employment['+b+']"  value="permanent" required="required" /> &nbsp; Contractual:<input type="radio" class="flat" name="type_of_employment['+b+']"  value="contractual" /> &nbsp; Part-Time: <input type="radio" class="flat" name="type_of_employment['+b+']"  value="part-time"  /> &nbsp; Full-Time:<input type="radio" class="flat" name="type_of_employment['+b+']"  value="full-time" /></p></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-name-designation">Supervisor Name & Designation: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="supervisor_name_designation[]" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-number">Supervisor Number: <span class="required">*</span></label><div class="col-md-2 col-sm-6 "><input type="number" name="supervisor_number[]" maxlength="15" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="supervisor-mail">Supervisor Mail Id: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="email" name="supervisor_mail[]" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="empoyer-availability">Can the employer be contacted now ? : <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><p style="margin-top:8px;">Yes:<input type="radio" class="flat" name="employer_availability['+b+']"  value="Yes" required="required" /> &nbsp; No:<input type="radio" class="flat" name="employer_availability['+b+']"  value="No" /></p></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="employer-contact-date">If not, then provide an alternate date:</label><div class="col-md-2 col-sm-6 "><input type="date" name="employer_contact_date[]" class="date-picker form-control"></div> </div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reason-for-leaving">Reason for leaving: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="reason_for_leaving[]" required="required" class="form-control  "></div></div><br><h4><center>Company Address</center></h4><br><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="building-no">Building No & Street: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><textarea class="form-control" name="company_building_no[]" maxlength="50" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity("Only alphanumeric characters with (-)&(,)&(.) is allowed.")" oninput="this.setCustomValidity("")" required="required" ></textarea></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="city">City: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control" name="company_city[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="state">State: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control" name="company_state[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="pin">PIN: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control" name="company_pin[]" maxlength="10" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="landline">Landline: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" class="form-control" name="company_landline[]" maxlength="15" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="appointment-letter">Appointment Letter: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="file" accept="image/*" name="appointment_letter[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="salary-slip">Salary Slip: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="file" accept="image/*" name="salary_slip[]" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="relieving-letter">Relieving Letter: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="file" accept="image/*" name="relieving_letter[]" required="required" ></div></div><div class="row" style="margin-top:40px;"><div class="col-md-2 offset-md-10"><input type="button" name="remove" id="remove" value="Remove"  class="btn btn-danger btn-lg" style=" padding: 12px;width: 154px;border-radius: 10px;"></div></div></div>';

                var isFormValid = true;

                $("#step-3 input").each(function()
                {
                  if($(this).prop('required'))
                      {
                        if ($.trim($(this).val()).length == 0)
                        {
                            $(this).addClass("highlight");
                            isFormValid = false;
                            $(this).focus();
                        }
                        else
                        {
                            $(this).removeClass("highlight");
                        }
                      }
                });

                if (isFormValid) 
                {   
                    b++;
                    $("#002").append(html2);
                }
                else
                {
                    alert("Please fill in all the required fields (indicated by *) and then click on Add More button");
                }
             });
              
                $("#002").on('click','#remove',function()
             {
                b--;
                $(this).closest('.opening').remove();
              });

              $("#step-4").on('click','#add3',function()
              {
                var html3 = '<div class="opening"><table><tr><td style="width:50%"><hr/></td><td style="vertical-align:middle;"></td><td style="width:50%"><hr/></td></tr></table><h4><center>Additional Form ['+c+']</center></h4><table><tr><td style="width:50%"><hr/></td><td style="vertical-align:middle;"></td><td style="width:50%"><hr/></td></tr></table><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-name">Name: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="reference_person_name[]" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" required="required" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-organization">Organization: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="reference_person_organization[]" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" required="required" class="form-control "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-designation">Designation: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="reference_person_designation[]" maxlength="50" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" required="required" class="form-control "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-association">How associated/ Known to you: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="text" name="reference_person_association[]" required="required" maxlength="100" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity("Only alphabets are allowed.")" oninput="this.setCustomValidity("")" class="form-control  "></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-association-year">Years of association: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><input type="number" name="reference_person_association_year[]" required="required" class="form-control  "></div></div><div class="title"><h6 style="text-align:center">Contact Details</h6></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-address">Address: <span class="required">*</span></label><div class="col-md-6 col-sm-6 "><textarea class="form-control" name="reference_person_address[]" maxlength="150" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity("Only alphanumeric characters with (-)&(,)&(.) is allowed.")" oninput="this.setCustomValidity("")" required="required" ></textarea></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-landline">Landline: <span class="required">*</span></label><div class="col-md-2 col-sm-6 "><input type="number" class="form-control" name="reference_person_landline[]" maxlength="15" required="required" ></div></div><div class="form-group row"><label class="col-form-label col-md-3 col-sm-3 label-align" for="reference-person-mobile">Mobile: <span class="required">*</span></label><div class="col-md-2 col-sm-6 "><input type="number" class="form-control" name="reference_person_mobile[]" maxlength="15" required="required" ></div></div><div class="row" style="margin-top:40px;"><div class="col-md-2 offset-md-10"><input type="button" name="remove" id="remove" value="Remove"  class="btn btn-danger btn-lg" style=" padding: 12px;width: 154px;border-radius: 10px;"></div></div></div>';
              
              var isFormValid = true;

                $("#step-4 input").each(function()
                {
                        if ($.trim($(this).val()).length == 0)
                        {
                            $(this).addClass("highlight");
                            isFormValid = false;
                            $(this).focus();
                        }
                        else
                        {
                            $(this).removeClass("highlight");
                        }
                });

                if (isFormValid) 
                {   
                    c++;
                    $("#003").append(html3);
                }
                else
                {
                    alert("Please fill in all the required fields (indicated by *) and then click on Add More button");
                }
             });
              
                $("#003").on('click','#remove',function()
             {
                c--;
                $(this).closest('.opening').remove();
              });
              
            $("input[id=no1]").click(function()
            {
                $("#yes1_reason").prop("disabled", true);
                $("#yes1_reason").prop("required", false);
            });

            $("input[id=yes1]").click(function()
            {
                $("#yes1_reason").prop("disabled", false);
                $("#yes1_reason").prop("required", true);
            });

            $("input[id=no2]").click(function()
            {
                $("#yes2_reason").prop("disabled", true);
                $("#yes2_reason").prop("required", false);
            });

            $("input[id=yes2]").click(function()
            {
                $("#yes2_reason").prop("disabled", false);
                $("#yes2_reason").prop("required", true);
            });
        });
            
             /*
             $("#secondary_education_details").on('click','#save1',function()
             {
              //stop default form submission
              //event.preventDefault();
              //submit form via AJAX
              alert('clicked Save1');
              $.post( "save_secondary_details.php", $( "#secondary_education_details" ).serialize() );
              //show response when done
              .done(function(data) {
                  alert( data );
               });
            });

              $('input[type="submit"]').on('click', function ()
              {
                this.closest('form').select();
                $(this :input).each(function(){
                  $(this).attr("disabled","true");
                });
              });

                function clearinput(){
                  $("#secondary_education_details :input").each(function(){
                    $(this).val('');
                  });
                }
             
                $('#secondary_education_details').submit(function(){
                  
                  return false;
                });
                

                $("#save1").click( function()
                {
                  alert('save1 button was clicked');

                  var mydata=$('#secondary_education_details').serialize()+'&save1=save1';
                  $.ajax({
                    url:'save_secondary_details.php',
                    type:'post',
                    data:data,
                    success:function(response)
                    {
                      $('#result').text(response);
                    }
                  });


                });
                
                 $("#secondary").on('click','#save1',function()
                      {
                        var instituteName= [];
                        $('input[name="instituteName[]"]').each(function(){ 
                          instituteName.push($(this).text());
                        });
                        var universityName= [];
                        $('input[name="universityName[]"]').each(function(){
                          universityName.push($(this).text());
                        });
                        var duration= [];
                        $('input[name="duration[]"]').each(function(){
                          duration.push($(this).text());
                        });
                        var division= [];
                        $('input[name="division[]"]').each(function(){
                          division.push($(this).text());
                        });
                        var obtained= [];
                        $('input[name="obtained[]"]').each(function(){
                          obtained.push($(this).text());
                        });
                        var course_type= [];
                        $('input[name="course_type[]"]').each(function(){
                          course_type.push($(this).text());
                        });
                        var major= [];
                        $('input[name="major[]"]').each(function(){
                          major.push($(this).text());
                        });
                        var roll_no= [];
                        $('input[name="roll_no[]"]').each(function(){
                          roll_no.push($(this).text());
                        });
                        var building_no= [];
                        $('input[name="building_no[]"]').each(function(){
                          building_no.push($(this).text());
                        });
                        var city= [];
                        $('input[name="city[]"]').each(function(){
                          city.push($(this).text());
                        });
                        var state= [];
                        $('input[name="state[]"]').each(function(){
                          state.push($(this).text());
                        });
                        var pin= [];
                        $('input[name="pin[]"]').each(function(){
                          pin.push($(this).text());
                        });
                        var landline= [];
                        $('input[name="landline[]"]').each(function(){
                          landline.push($(this).text());
                        });
                        var mark_sheets= [];
                        $('input[name="mark_sheets[]"]').each(function(){
                          mark_sheets.push($(this).text());
                        });
                        var degree_certificate= [];
                        $('input[name="degree_certificate[]"]').each(function(){
                          degree_certificate.push($(this).text());
                        });
                        var provisional_degree= [];
                        $('input[name="provisional_degree[]"]').each(function(){
                          provisional_degree.push($(this).text());
                        });

                        
                        
                        $.ajax({
                          
                          url:"save_secondary_details.php",
                          method:"POST",
                          data:{instituteName:instituteName, universityName:universityName, duration:duration, division:division, obtained:obtained, course_type:course_type, major:major, roll_no:roll_no, building_no:building_no, city:city, state:state, pin:pin, landline:landline, mark_sheets:mark_sheets, degree_certificate:degree_certificate, provisional_degree:provisional_degree},
                          success:function(data)
                          {
                            alert(data);

                          }
                        });

                      });*/