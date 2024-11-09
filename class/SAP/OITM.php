<?php

class OITM
{
    // 1. ItemCode
    private $ItemCode;
    // 2. ItemName
    private $ItemName;
    // 3. FrgnName
    private $FrgnName;
    // 4. ItmsGrpCod
    private $ItmsGrpCod;
    // 5. CstGrpCode
    private $CstGrpCode = '-1';
    // 6. VatGourpSa
    private $VatGourpSa = 'null'; // Valor por defecto
    // 7. CodeBars
    private $CodeBars;
    // 8. VATLiable
    private $VATLiable = 'Y'; // Valor por defecto
    // 9. PrchseItem
    private $PrchseItem;
    // 10. SellItem
    private $SellItem;
    // 11. InvntItem
    private $InvntItem;
    // 12. OnHand
    private $OnHand = '0'; // Valor por defecto
    // 13. IsCommited
    private $IsCommited = '0'; // Valor por defecto
    // 14. OnOrder
    private $OnOrder = '0'; // Valor por defecto
    // 15. IncomeAcct
    private $IncomeAcct = 'null'; // Valor por defecto
    // 16. ExmptIncom
    private $ExmptIncom = 'null'; // Valor por defecto
    // 17. MaxLevel
    private $MaxLevel = '0'; // Valor por defecto
    // 18. DfltWH
    private $DfltWH = 'null'; // Valor por defecto
    // 19. CardCode
    private $CardCode;
    // 20. SuppCatNum
    private $SuppCatNum;
    // 21. BuyUnitMsr
    private $BuyUnitMsr;
    // 22. NumInBuy
    private $NumInBuy;
    // 23. ReorderQty
    private $ReorderQty = '0'; // Valor por defecto
    // 24. MinLevel
    private $MinLevel = '0'; // Valor por defecto
    // 25. LstEvlPric
    private $LstEvlPric = '0'; // Valor por defecto
    // 26. LstEvlDate
    private $LstEvlDate = 'null'; // Valor por defecto
    // 27. CustomPer
    private $CustomPer = '0'; // Valor por defecto
    // 28. Canceled
    private $Canceled = 'N'; // Valor por defecto
    // 29. MnufctTime
    private $MnufctTime = 'null'; // Valor por defecto
    // 30. WholSlsTax
    private $WholSlsTax = 'null'; // Valor por defecto
    // 31. RetilrTax
    private $RetilrTax = 'null'; // Valor por defecto
    // 32. SpcialDisc
    private $SpcialDisc = '0'; // Valor por defecto
    // 33. DscountCod
    private $DscountCod = 'null'; // Valor por defecto
    // 34. TrackSales
    private $TrackSales = 'N'; // Valor por defecto
    // 35. SalUnitMsr
    private $SalUnitMsr;
    // 36. NumInSale
    private $NumInSale;
    // 37. Consig
    private $Consig = '0'; // Valor por defecto
    // 38. QueryGroup
    private $QueryGroup = '0'; // Valor por defecto
    // 39. Counted
    private $Counted = '0'; // Valor por defecto
    // 40. OpenBlnc
    private $OpenBlnc = '0'; // Valor por defecto
    // 41. EvalSystem
    private $EvalSystem = 'A'; // Valor por defecto
    // 42. UserSign
    private $UserSign;
    // 43. FREE
    private $FREE = 'N'; // Valor por defecto
    // 44. PicturName
    private $PicturName;
    // 45. Transfered
    private $Transfered = 'N'; // Valor por defecto
    // 46. BlncTrnsfr
    private $BlncTrnsfr = 'N'; // Valor por defecto
    // 47. UserText
    private $UserText;
    // 48. SerialNum
    private $SerialNum = 'null'; // Valor por defecto
    // 49. CommisPcnt
    private $CommisPcnt = '0'; // Valor por defecto
    // 50. CommisSum
    private $CommisSum = '0'; // Valor por defecto
    // 51. CommisGrp
    private $CommisGrp = '0'; // Valor por defecto
    // 52. TreeType
    private $TreeType = 'N'; // Valor por defecto
    // 53. TreeQty
    private $TreeQty = '1'; // Valor por defecto
    // 54. LastPurPrc
    private $LastPurPrc = '0'; // Valor por defecto
    // 55. LastPurCur
    private $LastPurCur = 'null'; // Valor por defecto
    // 56. LastPurDat
    private $LastPurDat = 'null'; // Valor por defecto
    // 57. ExitCur
    private $ExitCur = 'null'; // Valor por defecto
    // 58. ExitPrice
    private $ExitPrice = '0'; // Valor por defecto
    // 59. ExitWH
    private $ExitWH = 'null'; // Valor por defecto
    // 60. AssetItem
    private $AssetItem = 'N'; // Valor por defecto
    // 61. WasCounted
    private $WasCounted = 'N'; // Valor por defecto
    // 62. ManSerNum
    private $ManSerNum = 'N'; // Valor por defecto
    // 63. SHeight1
    private $SHeight1;
    // 64. SHght1Unit
    private $SHght1Unit = '2';
    // 65. SHeight2
    private $SHeight2 = '0'; // Valor por defecto
    // 66. SHght2Unit
    private $SHght2Unit = 'null'; // Valor por defecto
    // 67. SWidth1
    private $SWidth1;
    // 68. SWdth1Unit
    private $SWdth1Unit = '2'; // Valor por defecto
    // 69. SWidth2
    private $SWidth2 = '0'; // Valor por defecto
    // 70. SWdth2Unit
    private $SWdth2Unit = 'null'; // Valor por defecto
    // 71. SLength1
    private $SLength1;
    // 72. SLen1Unit
    private $SLen1Unit = '2'; // Valor por defecto
    // 73. Slength2
    private $Slength2 = '0'; // Valor por defecto
    // 74. SLen2Unit
    private $SLen2Unit = 'null'; // Valor por defecto
    // 75. SVolume
    private $SVolume;
    // 76. SVolUnit
    private $SVolUnit;
    // 77. SWeight1
    private $SWeight1;
    // 78. SWght1Unit
    private $SWght1Unit = '3'; // Valor por defecto
    // 79. SWeight2
    private $SWeight2 = '0'; // Valor por defecto
    // 80. SWght2Unit
    private $SWght2Unit = 'null'; // Valor por defecto
    // 81. BHeight1
    private $BHeight1;
    // 82. BHght1Unit
    private $BHght1Unit = '2';
    // 83. BHeight2
    private $BHeight2 = '0'; // Valor por defecto
    // 84. BHght2Unit
    private $BHght2Unit = 'null'; // Valor por defecto
    // 85. BWidth1
    private $BWidth1;
    // 86. BWdth1Unit
    private $BWdth1Unit = '2'; // Valor por defecto
    // 87. BWidth2
    private $BWidth2 = '0'; // Valor por defecto
    // 88. BWdth2Unit
    private $BWdth2Unit = 'null'; // Valor por defecto
    // 89. BLength1
    private $BLength1;
    // 90. BLen1Unit
    private $BLen1Unit = '2'; // Valor por defecto
    // 91. Blength2
    private $Blength2 = '0'; // Valor por defecto
    // 92. BLen2Unit
    private $BLen2Unit = 'null'; // Valor por defecto
    // 93. BVolume
    private $BVolume;
    // 94. BVolUnit
    private $BVolUnit;
    // 95. BWeight1
    private $BWeight1;
    // 96. BWght1Unit
    private $BWght1Unit = '3'; // Valor por defecto
    // 97. BWeight2
    private $BWeight2 = '0'; // Valor por defecto
    // 98. BWght2Unit
    private $BWght2Unit = 'null'; // Valor por defecto
    // 99. FixCurrCms
    private $FixCurrCms = 'null'; // Valor por defecto
    // 100. FirmCode
    private $FirmCode;
    // 101. LstSalDate
    private $LstSalDate = 'null'; // Valor por defecto
    // 102. QryGroup1
    private $QryGroup1;
    // 103. QryGroup2
    private $QryGroup2;
    // 104. QryGroup3
    private $QryGroup3;
    // 105. QryGroup4
    private $QryGroup4;
    // 106. QryGroup5
    private $QryGroup5;
    // 107. QryGroup6
    private $QryGroup6;
    // 108. QryGroup7
    private $QryGroup7;
    // 109. QryGroup8
    private $QryGroup8;
    // 110. QryGroup9
    private $QryGroup9;
    // 111. QryGroup10
    private $QryGroup10;
    // 112. QryGroup11
    private $QryGroup11;
    // 113. QryGroup12
    private $QryGroup12;
    // 114. QryGroup13
    private $QryGroup13;
    // 115. QryGroup14
    private $QryGroup14;
    // 116. QryGroup15
    private $QryGroup15;
    // 117. QryGroup16
    private $QryGroup16;
    // 118. QryGroup17
    private $QryGroup17;
    // 119. QryGroup18
    private $QryGroup18;
    // 120. QryGroup19
    private $QryGroup19;
    // 121. QryGroup20
    private $QryGroup20;
    // 122. QryGroup21
    private $QryGroup21;
    // 123. QryGroup22
    private $QryGroup22;
    // 124. QryGroup23
    private $QryGroup23;
    // 125. QryGroup24
    private $QryGroup24;
    // 126. QryGroup25
    private $QryGroup25;
    // 127. QryGroup26
    private $QryGroup26;
    // 128. QryGroup27
    private $QryGroup27;
    // 129. QryGroup28
    private $QryGroup28;
    // 130. QryGroup29
    private $QryGroup29;
    // 131. QryGroup30
    private $QryGroup30;
    // 132. QryGroup31
    private $QryGroup31;
    // 133. QryGroup32
    private $QryGroup32;
    // 134. QryGroup33
    private $QryGroup33;
    // 135. QryGroup34
    private $QryGroup34;
    // 136. QryGroup35
    private $QryGroup35;
    // 137. QryGroup36
    private $QryGroup36;
    // 138. QryGroup37
    private $QryGroup37;
    // 139. QryGroup38
    private $QryGroup38;
    // 140. QryGroup39
    private $QryGroup39;
    // 141. QryGroup40
    private $QryGroup40;
    // 142. QryGroup41
    private $QryGroup41;
    // 143. QryGroup42
    private $QryGroup42;
    // 144. QryGroup43
    private $QryGroup43;
    // 145. QryGroup44
    private $QryGroup44;
    // 146. QryGroup45
    private $QryGroup45;
    // 147. QryGroup46
    private $QryGroup46;
    // 148. QryGroup47
    private $QryGroup47;
    // 149. QryGroup48
    private $QryGroup48;
    // 150. QryGroup49
    private $QryGroup49;
    // 151. QryGroup50
    private $QryGroup50;
    // 152. QryGroup51
    private $QryGroup51;
    // 153. QryGroup52
    private $QryGroup52;
    // 154. QryGroup53
    private $QryGroup53;
    // 155. QryGroup54
    private $QryGroup54;
    // 156. QryGroup55
    private $QryGroup55;
    // 157. QryGroup56
    private $QryGroup56;
    // 158. QryGroup57
    private $QryGroup57;
    // 159. QryGroup58
    private $QryGroup58;
    // 160. QryGroup59
    private $QryGroup59;
    // 161. QryGroup60
    private $QryGroup60;
    // 162. QryGroup61
    private $QryGroup61;
    // 163. QryGroup62
    private $QryGroup62;
    // 164. QryGroup63
    private $QryGroup63;
    // 165. QryGroup64
    private $QryGroup64;
    // 166. CreateDate
    private $CreateDate;
    // 167. UpdateDate
    private $UpdateDate;
    // 168. ExportCode
    private $ExportCode = 'null'; // Valor por defecto
    // 169. SalFactor1
    private $SalFactor1 = '1'; // Valor por defecto
    // 170. SalFactor2
    private $SalFactor2 = '1'; // Valor por defecto
    // 171. SalFactor3
    private $SalFactor3 = '1'; // Valor por defecto
    // 172. SalFactor4
    private $SalFactor4 = '1'; // Valor por defecto
    // 173. PurFactor1
    private $PurFactor1 = '1'; // Valor por defecto
    // 174. PurFactor2
    private $PurFactor2 = '1'; // Valor por defecto
    // 175. PurFactor3
    private $PurFactor3 = '1'; // Valor por defecto
    // 176. PurFactor4
    private $PurFactor4 = '1'; // Valor por defecto
    // 177. SalFormula
    private $SalFormula = 'null'; // Valor por defecto
    // 178. PurFormula
    private $PurFormula = 'null'; // Valor por defecto
    // 179. VatGroupPu
    private $VatGroupPu = 'null'; // Valor por defecto
    // 180. AvgPrice
    private $AvgPrice = '0'; // Valor por defecto
    // 181. PurPackMsr
    private $PurPackMsr;
    // 182. PurPackUn
    private $PurPackUn;
    // 183. SalPackMsr
    private $SalPackMsr;
    // 184. SalPackUn
    private $SalPackUn;
    // 185. SCNCounter
    private $SCNCounter = 'null'; // Valor por defecto
    // 186. ManBtchNum
    private $ManBtchNum = 'N'; // Valor por defecto
    // 187. ManOutOnly
    private $ManOutOnly = 'N'; // Valor por defecto
    // 188. DataSource
    private $DataSource = 'I'; // Valor por defecto
    // 189. validFor
    private $validFor;
    // 190. validFrom
    private $validFrom = 'null'; // Valor por defecto
    // 191. validTo
    private $validTo = 'null'; // Valor por defecto
    // 192. frozenFor
    private $frozenFor;
    // 193. frozenFrom
    private $frozenFrom = 'null'; // Valor por defecto
    // 194. frozenTo
    private $frozenTo = 'null'; // Valor por defecto
    // 195. BlockOut
    private $BlockOut = 'Y'; // Valor por defecto
    // 196. ValidComm
    private $ValidComm = 'null'; // Valor por defecto
    // 197. FrozenComm
    private $FrozenComm = 'null'; // Valor por defecto
    // 198. LogInstanc
    private $LogInstanc = '0'; // Valor por defecto
    // 199. ObjType
    private $ObjType = '4'; // Valor por defecto
    // 200. SWW
    private $SWW;
    // 201. Deleted
    private $Deleted = 'N'; // Valor por defecto
    // 202. DocEntry
    private $DocEntry;
    // 203. ExpensAcct
    private $ExpensAcct = 'null'; // Valor por defecto
    // 204. FrgnInAcct
    private $FrgnInAcct = 'null'; // Valor por defecto
    // 205. ShipType
    private $ShipType;
    // 206. GLMethod
    private $GLMethod = 'C'; // Valor por defecto
    // 207. ECInAcct
    private $ECInAcct = 'null'; // Valor por defecto
    // 208. FrgnExpAcc
    private $FrgnExpAcc = 'null'; // Valor por defecto
    // 209. ECExpAcc
    private $ECExpAcc = 'null'; // Valor por defecto
    // 210. TaxType
    private $TaxType = 'Y'; // Valor por defecto
    // 211. ByWh
    private $ByWh;
    // 212. WTLiable
    private $WTLiable;
    // 213. ItemType
    private $ItemType = 'I'; // Valor por defecto
    // 214. WarrntTmpl
    private $WarrntTmpl = 'null'; // Valor por defecto
    // 215. BaseUnit
    private $BaseUnit = 'null'; // Valor por defecto
    // 216. CountryOrg
    private $CountryOrg = 'null'; // Valor por defecto
    // 217. StockValue
    private $StockValue = '0'; // Valor por defecto
    // 218. Phantom
    private $Phantom = 'N'; // Valor por defecto
    // 219. IssueMthd
    private $IssueMthd = 'M'; // Valor por defecto
    // 220. FREE1
    private $FREE1 = 'null'; // Valor por defecto
    // 221. PricingPrc
    private $PricingPrc = '0'; // Valor por defecto
    // 222. MngMethod
    private $MngMethod = 'A'; // Valor por defecto
    // 223. ReorderPnt
    private $ReorderPnt = '0'; // Valor por defecto
    // 224. InvntryUom
    private $InvntryUom;
    // 225. PlaningSys
    private $PlaningSys;
    // 226. PrcrmntMtd
    private $PrcrmntMtd = 'B'; // Valor por defecto
    // 227. OrdrIntrvl
    private $OrdrIntrvl;
    // 228. OrdrMulti
    private $OrdrMulti;
    // 229. MinOrdrQty
    private $MinOrdrQty;
    // 230. LeadTime
    private $LeadTime;
    // 231. IndirctTax
    private $IndirctTax;
    // 232. TaxCodeAR
    private $TaxCodeAR;
    // 233. TaxCodeAP
    private $TaxCodeAP;
    // 234. OSvcCode
    private $OSvcCode = '-1'; // Valor por defecto
    // 235. ISvcCode
    private $ISvcCode = '-1'; // Valor por defecto
    // 236. ServiceGrp
    private $ServiceGrp = '-1'; // Valor por defecto
    // 237. NCMCode
    private $NCMCode = '-1'; // Valor por defecto
    // 238. MatType
    private $MatType = '1'; // Valor por defecto
    // 239. MatGrp
    private $MatGrp = '-1'; // Valor por defecto
    // 240. ProductSrc
    private $ProductSrc = '0'; // Valor por defecto
    // 241. ServiceCtg
    private $ServiceCtg = '-1'; // Valor por defecto
    // 242. ItemClass
    private $ItemClass = '2'; // Valor por defecto
    // 243. Excisable
    private $Excisable = 'N'; // Valor por defecto
    // 244. ChapterID
    private $ChapterID = '-1'; // Valor por defecto
    // 245. NotifyASN
    private $NotifyASN = 'null'; // Valor por defecto
    // 246. ProAssNum
    private $ProAssNum = 'null'; // Valor por defecto
    // 247. AssblValue
    private $AssblValue = '0'; // Valor por defecto
    // 248. DNFEntry
    private $DNFEntry = '-1'; // Valor por defecto
    // 249. UserSign2
    private $UserSign2;
    // 250. Spec
    private $Spec = 'null'; // Valor por defecto
    // 251. TaxCtg
    private $TaxCtg = 'null'; // Valor por defecto
    // 252. Series
    private $Series = '3'; // Valor por defecto
    // 253. Number
    private $Number = 'null';
    // 254. FuelCode
    private $FuelCode = '-1'; // Valor por defecto
    // 255. BeverTblC
    private $BeverTblC = 'null'; // Valor por defecto
    // 256. BeverGrpC
    private $BeverGrpC = 'null'; // Valor por defecto
    // 257. BeverTM
    private $BeverTM = '-1'; // Valor por defecto
    // 258. Attachment
    private $Attachment = 'null'; // Valor por defecto
    // 259. AtcEntry
    private $AtcEntry = 'null'; // Valor por defecto
    // 260. ToleranDay
    private $ToleranDay;
    // 261. UgpEntry
    private $UgpEntry = '-1'; // Valor por defecto
    // 262. PUoMEntry
    private $PUoMEntry = 'null'; // Valor por defecto
    // 263. SUoMEntry
    private $SUoMEntry = 'null'; // Valor por defecto
    // 264. IUoMEntry
    private $IUoMEntry = '-1'; // Valor por defecto
    // 265. IssuePriBy
    private $IssuePriBy = '0'; // Valor por defecto
    // 266. AssetClass
    private $AssetClass = 'null'; // Valor por defecto
    // 267. AssetGroup
    private $AssetGroup = 'null'; // Valor por defecto
    // 268. InventryNo
    private $InventryNo = 'null'; // Valor por defecto
    // 269. Technician
    private $Technician = 'null'; // Valor por defecto
    // 270. Employee
    private $Employee = 'null'; // Valor por defecto
    // 271. Location
    private $Location = 'null'; // Valor por defecto
    // 272. StatAsset
    private $StatAsset = 'N'; // Valor por defecto
    // 273. Cession
    private $Cession = 'N'; // Valor por defecto
    // 274. DeacAftUL
    private $DeacAftUL = 'N'; // Valor por defecto
    // 275. AsstStatus
    private $AsstStatus = 'N'; // Valor por defecto
    // 276. CapDate
    private $CapDate = 'null'; // Valor por defecto
    // 277. AcqDate
    private $AcqDate = 'null'; // Valor por defecto
    // 278. RetDate
    private $RetDate = 'null'; // Valor por defecto
    // 279. GLPickMeth
    private $GLPickMeth = 'A';
    // 280. NoDiscount
    private $NoDiscount;
    // 281. MgrByQty
    private $MgrByQty = 'N'; // Valor por defecto
    // 282. AssetRmk1
    private $AssetRmk1 = 'null'; // Valor por defecto
    // 283. AssetRmk2
    private $AssetRmk2 = 'null'; // Valor por defecto
    // 284. AssetAmnt1
    private $AssetAmnt1 = '0'; // Valor por defecto
    // 285. AssetAmnt2
    private $AssetAmnt2 = '0'; // Valor por defecto
    // 286. DeprGroup
    private $DeprGroup = 'null'; // Valor por defecto
    // 287. AssetSerNo
    private $AssetSerNo = 'null'; // Valor por defecto
    // 288. CntUnitMsr
    private $CntUnitMsr = 'null'; // Valor por defecto
    // 289. NumInCnt
    private $NumInCnt = '1'; // Valor por defecto
    // 290. INUoMEntry
    private $INUoMEntry = 'null'; // Valor por defecto
    // 291. OneBOneRec
    private $OneBOneRec = 'N'; // Valor por defecto
    // 292. RuleCode
    private $RuleCode = 'null'; // Valor por defecto
    // 293. ScsCode
    private $ScsCode = 'null'; // Valor por defecto
    // 294. SpProdType
    private $SpProdType = 'null'; // Valor por defecto
    // 295. IWeight1
    private $IWeight1;
    // 296. IWght1Unit
    private $IWght1Unit = '3'; // Valor por defecto
    // 297. IWeight2
    private $IWeight2 = '0';
    // 298. IWght2Unit
    private $IWght2Unit = 'null'; // Valor por defecto
    // 299. CompoWH
    private $CompoWH = 'B'; // Valor por defecto
    // 300. CreateTS
    private $CreateTS;
    // 301. UpdateTS
    private $UpdateTS;
    // 302. VirtAstItm
    private $VirtAstItm = 'N'; // Valor por defecto
    // 303. SouVirAsst
    private $SouVirAsst = 'null'; // Valor por defecto
    // 304. InCostRoll
    private $InCostRoll = 'Y'; // Valor por defecto
    // 305. PrdStdCst
    private $PrdStdCst = 'null'; // Valor por defecto
    // 306. EnAstSeri
    private $EnAstSeri = 'N'; // Valor por defecto
    // 307. LinkRsc
    private $LinkRsc = 'null'; // Valor por defecto
    // 308. OnHldPert
    private $OnHldPert = 'null'; // Valor por defecto
    // 309. onHldLimt
    private $onHldLimt = 'null'; // Valor por defecto
    // 310. PriceUnit
    private $PriceUnit = '-1'; // Valor por defecto
    // 311. GSTRelevnt
    private $GSTRelevnt = 'N'; // Valor por defecto
    // 312. SACEntry
    private $SACEntry = '-1'; // Valor por defecto
    // 313. GstTaxCtg
    private $GstTaxCtg = 'R'; // Valor por defecto
    // 314. AssVal4WTR
    private $AssVal4WTR = '0'; // Valor por defecto
    // 315. ExcImpQUoM
    private $ExcImpQUoM = 'null'; // Valor por defecto
    // 316. ExcFixAmnt
    private $ExcFixAmnt = 'null'; // Valor por defecto
    // 317. ExcRate
    private $ExcRate = 'null'; // Valor por defecto
    // 318. SOIExc
    private $SOIExc = '4'; // Valor por defecto
    // 319. TNVED
    private $TNVED = 'null'; // Valor por defecto
    // 320. Imported
    private $Imported = 'N'; // Valor por defecto
    // 321. AutoBatch
    private $AutoBatch = 'N'; // Valor por defecto
    // 322. CstmActing
    private $CstmActing = 'N'; // Valor por defecto
    // 323. StdItemId
    private $StdItemId = 'null'; // Valor por defecto
    // 324. CommClass
    private $CommClass = 'null'; // Valor por defecto
    // 325. TaxCatCode
    private $TaxCatCode = 'null'; // Valor por defecto
    // 326. DataVers
    private $DataVers = '1'; // Valor por defecto
    // 327. NVECode
    private $NVECode = 'null'; // Valor por defecto
    // 328. CESTCode
    private $CESTCode = '-1'; // Valor por defecto
    // 329. CtrSealQty
    private $CtrSealQty = 'null'; // Valor por defecto
    // 330. LegalText
    private $LegalText = 'null'; // Valor por defecto
    // 331. QRCodeSrc
    private $QRCodeSrc = 'null'; // Valor por defecto
    // 332. Traceable
    private $Traceable = 'N'; // Valor por defecto
    // 333. U_HBT_TerceroFacPro
    private $U_HBT_TerceroFacPro = 'null'; // Valor por defecto
    // 334. U_HBT_TerceroAmorti
    private $U_HBT_TerceroAmorti = 'null'; // Valor por defecto
    // 335. U_HBT_TerceroBaja
    private $U_HBT_TerceroBaja = 'null'; // Valor por defecto
    // 336. U_IFRS_TERM
    private $U_IFRS_TERM = 'null'; // Valor por defecto
    // 337. U_IFRS_VENT
    private $U_IFRS_VENT = 'null'; // Valor por defecto
    // 338. U_IFRS_MARK
    private $U_IFRS_MARK = 'null'; // Valor por defecto
    // 339. U_IFRS_GTIA
    private $U_IFRS_GTIA = 'null'; // Valor por defecto
    // 340. U_IFRS_Tiempo
    private $U_IFRS_Tiempo = 'null'; // Valor por defecto
    // 341. U_IFRS_ActPadre
    private $U_IFRS_ActPadre = 'null'; // Valor por defecto
    // 342. U_HBT_FecPoliza
    private $U_HBT_FecPoliza = 'null'; // Valor por defecto
    // 343. U_HBT_FecVtoGarn
    private $U_HBT_FecVtoGarn = 'null'; // Valor por defecto
    // 344. U_HBT_FecMantto
    private $U_HBT_FecMantto = 'null'; // Valor por defecto
    // 345. U_IFRS_Tipo
    private $U_IFRS_Tipo = 'null'; // Valor por defecto
    // 346. U_IFRS_EXCDET
    private $U_IFRS_EXCDET = 'null'; // Valor por defecto
    // 347. U_IFRS_TipoAF
    private $U_IFRS_TipoAF = 'null'; // Valor por defecto
    // 348. U_HBT_CANTM2
    private $U_HBT_CANTM2 = 'null'; // Valor por defecto
    // 349. U_HBT_PRECIOXM2
    private $U_HBT_PRECIOXM2;
    // 350. U_HBT_FECHA_AR
    private $U_HBT_FECHA_AR = 'null'; // Valor por defecto
    // 351. U_HBT_FAMILIA
    private $U_HBT_FAMILIA;
    // 352. U_HBT_CATEGORIA
    private $U_HBT_CATEGORIA;
    // 353. U_HBT_LINEA
    private $U_HBT_LINEA;
    // 354. U_HBT_TIPOLISTA
    private $U_HBT_TIPOLISTA;
    // 355. U_HBT_CODIGOTAB
    private $U_HBT_CODIGOTAB;
    // 356. U_U_HBT_TABDTOGRU
    private $U_U_HBT_TABDTOGRU;
    // 357. U_HBT_PREBASE
    private $U_HBT_PREBASE;
    // 358. U_HBT_DTOPROV
    private $U_HBT_DTOPROV;
    // 359. U_HBT_COSBASE
    private $U_HBT_COSBASE;
    // 360. U_HBT_PORGASTOS
    private $U_HBT_PORGASTOS;
    // 361. U_HBT_COSESTIMADO
    private $U_HBT_COSESTIMADO;
    // 362. U_HBT_MARGENMIN
    private $U_HBT_MARGENMIN;
    // 363. U_HBT_PORINCRE
    private $U_HBT_PORINCRE;
    // 364. U_HBT_MUTIL
    private $U_HBT_MUTIL;
    // 365. U_HBT_DTOMAX
    private $U_HBT_DTOMAX;
    // 366. U_HBT_pvmc
    private $U_HBT_pvmc;
    // 367. U_HBT_PVMP
    private $U_HBT_PVMP;
    // 368. U_HBT_MUPVMP
    private $U_HBT_MUPVMP;
    // 369. U_HBT_MUpvmc
    private $U_HBT_MUpvmc;
    // 370. U_U_HBT_COSPROM
    private $U_U_HBT_COSPROM;
    // 371. U_HBT_FLETES
    private $U_HBT_FLETES;
    // 372. U_HBT_FVOLUMEN
    private $U_HBT_FVOLUMEN = '1'; // Valor por defecto
    // 373. U_HBT_DTOFAB
    private $U_HBT_DTOFAB = '0'; // Valor por defecto
    // 374. U_HBT_CONCEPTO
    private $U_HBT_CONCEPTO = '1'; // Valor por defecto
    // 375. U_HBT_VRGASTOS
    private $U_HBT_VRGASTOS;
    // 376. U_PLU
    private $U_PLU = 'null'; // Valor por defecto
    // 377. U_HBT_CodigoProducto
    private $U_HBT_CodigoProducto = 'null'; // Valor por defecto
    // 378. U_HBT_TABDTOADI
    private $U_HBT_TABDTOADI;
    // 379. U_HBT_CodProductoFE
    private $U_HBT_CodProductoFE = 'null'; // Valor por defecto
    // 380. U_HBT_POSICION
    private $U_HBT_POSICION = 'null'; // Valor por defecto
    // 381. U_HBT_CLASIFICACION
    private $U_HBT_CLASIFICACION = 'null'; // Valor por defecto
    // 382. U_HBT_CodVendedor
    private $U_HBT_CodVendedor = 'null'; // Valor por defecto
    // 383. U_HBT_AplicaAIU
    private $U_HBT_AplicaAIU = 'N'; // Valor por defecto
    // 384. U_HBT_SUBGRUPO
    private $U_HBT_SUBGRUPO = 'null'; // Valor por defecto
    // 385. U_HBT_FSMIN
    private $U_HBT_FSMIN;
    // 386. U_HBT_FSMAX
    private $U_HBT_FSMAX;
    // 387. U_HBT_Modelo
    private $U_HBT_Modelo = 'null'; // Valor por defecto
    // 388. U_HBT_Marca
    private $U_HBT_Marca = 'null'; // Valor por defecto
    // 389. U_HBT_BolsaPlas
    private $U_HBT_BolsaPlas = 'N'; // Valor por defecto
    // 390. U_HBT_COMPENSACION
    private $U_HBT_COMPENSACION = 'null'; // Valor por defecto
    // 391. U_HBT_VRCOMPENSACION
    private $U_HBT_VRCOMPENSACION = '0'; // Valor por defecto
    // 392. U_HBT_USOCOSPROM
    private $U_HBT_USOCOSPROM;
    // 393. U_HBT_FecIniDto
    private $U_HBT_FecIniDto;
    // 394. U_HBT_FecFinDto
    private $U_HBT_FecFinDto;
    // 395. U_HBT_NDTOMAX
    private $U_HBT_NDTOMAX;
    // 396. U_HBT_MENSAJEMP
    private $U_HBT_MENSAJEMP;
    // 397. U_HBT_NomPlanograma
    private $U_HBT_NomPlanograma;
    // 398. U_HBT_PlanoDominante
    private $U_HBT_PlanoDominante = 'N';
    // 399. U_HBT_PlanoCompet
    private $U_HBT_PlanoCompet = 'N'; // Valor por defecto
    // 400. U_HBT_UsuarioP1
    private $U_HBT_UsuarioP1;
    // 401. U_HBT_UsuarioP2
    private $U_HBT_UsuarioP2;
    // 402. U_HBT_UsuarioP3
    private $U_HBT_UsuarioP3;
    // 403. U_HBT_LAYOUT
    private $U_HBT_LAYOUT;
    // 404. U_HBT_ROL
    private $U_HBT_ROL;
    // 405. U_HBT_Especialidad
    private $U_HBT_Especialidad;
    // 406. U_HBT_DtoAdicional
    private $U_HBT_DtoAdicional;
    // 407. U_HBT_CODIGODET
    private $U_HBT_CODIGODET;
    // 408. U_HBT_PREPARACION
    private $U_HBT_PREPARACION;
    // 409. U_HBT_SERENVIOS
    private $U_HBT_SERENVIOS;
    // 410. U_HBT_ACTTRANSNAC
    private $U_HBT_ACTTRANSNAC;
    // 411. U_HBT_DESCCOMART
    private $U_HBT_DESCCOMART;
    // 412. U_HBT_ACTMAGENTO
    private $U_HBT_ACTMAGENTO;
    // 413. U_HBT_ACTMAGENTOB2B
    private $U_HBT_ACTMAGENTOB2B;
    // 414. U_HBT_ACTMAGENTOB2C
    private $U_HBT_ACTMAGENTOB2C;
    // 415. U_HBT_FirmCode
    private $U_HBT_FirmCode = 'null'; // Valor por defecto
    // 416. U_HBT_PROVCORONA
    private $U_HBT_PROVCORONA;
    // 417. U_HBT_Alineaprov
    private $U_HBT_Alineaprov;
    // 418. U_HBT_PlanoIntroDist
    private $U_HBT_PlanoIntroDist;
    // 419. U_HBT_PlanoIntroSV
    private $U_HBT_PlanoIntroSV;
    // 420. U_HBT_PlanoIntroConst
    private $U_HBT_PlanoIntroConst;
    // 421. U_HBT_PlanoIntroInfra
    private $U_HBT_PlanoIntroInfra;
    // 422. U_HBT_Marquilla
    private $U_HBT_Marquilla;
    // 423. U_HBT_PlanoIntroSVFE
    private $U_HBT_PlanoIntroSVFE = 'N'; // Valor por defecto
    // 424. U_HBT_PlanoIntroDistFE
    private $U_HBT_PlanoIntroDistFE;
    // 425. U_HBT_PORTAFOLIO
    private $U_HBT_PORTAFOLIO;
    // 426. U_HBT_DTOADIPROV
    private $U_HBT_DTOADIPROV;
    // 427. U_HBT_FECDTOADIPRO
    private $U_HBT_FECDTOADIPRO;
    // 428. U_HBT_COSTOPRODUCTO
    private $U_HBT_COSTOPRODUCTO;
    // 429. U_HBT_APLICADTOADIPRO
    private $U_HBT_APLICADTOADIPRO = 'N'; // Valor por defecto
    // 430. U_HBT_COMPRADOR
    private $U_HBT_COMPRADOR = 'null'; // Valor por defecto
    // 431. U_HBT_ValIBUA
    private $U_HBT_ValIBUA = 'null'; // Valor por defecto
    // 432. U_HBT_CantML
    private $U_HBT_CantML = 'null'; // Valor por defecto
    // 433. U_HBT_ValINPP
    private $U_HBT_ValINPP = 'null'; // Valor por defecto
    // 434. U_HBT_CantINPP
    private $U_HBT_CantINPP = 'null'; // Valor por defecto
    // 435. U_HBT_ValICL
    private $U_HBT_ValICL = 'null'; // Valor por defecto
    // 436. U_HBT_CantICL
    private $U_HBT_CantICL = 'null'; // Valor por defecto
    // 437. U_HBT_BaseADV
    private $U_HBT_BaseADV = 'null'; // Valor por defecto

    public function __construct($datos = null)
    {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->ItemCode = $datos['ItemCode'];
                $this->ItemName = utf8_decode($datos['ItemName']);
                $this->FrgnName = utf8_decode($datos['FrgnName']);
                $this->ItmsGrpCod = $datos['ItmsGrpCod'];
                $this->CodeBars = $datos['CodeBars'];
                $this->PrchseItem = $datos['PrchseItem'];
                $this->SellItem = $datos['SellItem'];
                $this->InvntItem = $datos['InvntItem'];
                $this->CardCode = $datos['CardCode'];
                $this->SuppCatNum = $datos['SuppCatNum'];
                $this->BuyUnitMsr = utf8_decode($datos['BuyUnitMsr']);
                $this->NumInBuy = $datos['NumInBuy'];
                $this->SalUnitMsr = utf8_decode($datos['SalUnitMsr']);
                $this->NumInSale = $datos['NumInSale'];
                $this->UserSign = $datos['UserSign'] ?? '1';
                $this->PicturName = utf8_decode($datos['PicturName'] ?? '');
                $this->UserText = utf8_decode($datos['UserText']);
                $this->SHeight1 = $datos['SHeight1'];
                $this->SWidth1 = $datos['SWidth1'];
                $this->SLength1 = $datos['SLength1'];
                $this->SVolume = $datos['SVolume'];
                $this->SVolUnit = $datos['SVolUnit'];
                $this->SWeight1 = $datos['SWeight1'];
                $this->BHeight1 = $datos['BHeight1'];
                $this->BWidth1 = $datos['BWidth1'];
                $this->BLength1 = $datos['BLength1'];
                $this->BVolume = $datos['BVolume'];
                $this->BVolUnit = $datos['BVolUnit'];
                $this->BWeight1 = $datos['BWeight1'];
                $this->FirmCode = $datos['FirmCode'];
                $this->QryGroup1 = $datos['QryGroup1'];
                $this->QryGroup2 = $datos['QryGroup2'];
                $this->QryGroup3 = $datos['QryGroup3'];
                $this->QryGroup4 = $datos['QryGroup4'];
                $this->QryGroup5 = $datos['QryGroup5'];
                $this->QryGroup6 = $datos['QryGroup6'];
                $this->QryGroup7 = $datos['QryGroup7'];
                $this->QryGroup8 = $datos['QryGroup8'];
                $this->QryGroup9 = $datos['QryGroup9'];
                $this->QryGroup10 = $datos['QryGroup10'];
                $this->QryGroup11 = $datos['QryGroup11'];
                $this->QryGroup12 = $datos['QryGroup12'];
                $this->QryGroup13 = $datos['QryGroup13'];
                $this->QryGroup14 = $datos['QryGroup14'];
                $this->QryGroup15 = $datos['QryGroup15'];
                $this->QryGroup16 = $datos['QryGroup16'];
                $this->QryGroup17 = $datos['QryGroup17'];
                $this->QryGroup18 = $datos['QryGroup18'];
                $this->QryGroup19 = $datos['QryGroup19'];
                $this->QryGroup20 = $datos['QryGroup20'];
                $this->QryGroup21 = $datos['QryGroup21'];
                $this->QryGroup22 = $datos['QryGroup22'];
                $this->QryGroup23 = $datos['QryGroup23'];
                $this->QryGroup24 = $datos['QryGroup24'];
                $this->QryGroup25 = $datos['QryGroup25'];
                $this->QryGroup26 = $datos['QryGroup26'];
                $this->QryGroup27 = $datos['QryGroup27'];
                $this->QryGroup28 = $datos['QryGroup28'];
                $this->QryGroup29 = $datos['QryGroup29'];
                $this->QryGroup30 = $datos['QryGroup30'];
                $this->QryGroup31 = $datos['QryGroup31'];
                $this->QryGroup32 = $datos['QryGroup32'];
                $this->QryGroup33 = $datos['QryGroup33'];
                $this->QryGroup34 = $datos['QryGroup34'];
                $this->QryGroup35 = $datos['QryGroup35'];
                $this->QryGroup36 = $datos['QryGroup36'];
                $this->QryGroup37 = $datos['QryGroup37'];
                $this->QryGroup38 = $datos['QryGroup38'];
                $this->QryGroup39 = $datos['QryGroup39'];
                $this->QryGroup40 = $datos['QryGroup40'];
                $this->QryGroup41 = $datos['QryGroup41'];
                $this->QryGroup42 = $datos['QryGroup42'];
                $this->QryGroup43 = $datos['QryGroup43'];
                $this->QryGroup44 = $datos['QryGroup44'];
                $this->QryGroup45 = $datos['QryGroup45'];
                $this->QryGroup46 = $datos['QryGroup46'];
                $this->QryGroup47 = $datos['QryGroup47'];
                $this->QryGroup48 = $datos['QryGroup48'];
                $this->QryGroup49 = $datos['QryGroup49'];
                $this->QryGroup50 = $datos['QryGroup50'];
                $this->QryGroup51 = $datos['QryGroup51'];
                $this->QryGroup52 = $datos['QryGroup52'];
                $this->QryGroup53 = $datos['QryGroup53'];
                $this->QryGroup54 = $datos['QryGroup54'];
                $this->QryGroup55 = $datos['QryGroup55'];
                $this->QryGroup56 = $datos['QryGroup56'];
                $this->QryGroup57 = $datos['QryGroup57'];
                $this->QryGroup58 = $datos['QryGroup58'];
                $this->QryGroup59 = $datos['QryGroup59'];
                $this->QryGroup60 = $datos['QryGroup60'];
                $this->QryGroup61 = $datos['QryGroup61'];
                $this->QryGroup62 = $datos['QryGroup62'];
                $this->QryGroup63 = $datos['QryGroup63'];
                $this->QryGroup64 = $datos['QryGroup64'];
                $this->CreateDate = $datos['CreateDate'] ?? '';
                $this->UpdateDate = $datos['UpdateDate'] ?? '';
                $this->PurPackMsr = utf8_decode($datos['PurPackMsr']);
                $this->PurPackUn = $datos['PurPackUn'];
                $this->SalPackMsr = utf8_decode($datos['SalPackMsr']);
                $this->SalPackUn = $datos['SalPackUn'];
                $this->validFor = $datos['validFor'] ?? '';
                $this->frozenFor = $datos['frozenFor'];
                $this->SWW = $datos['SWW'];
                $this->DocEntry = $datos['DocEntry'] ?? '';
                $this->ShipType = $datos['ShipType'];
                $this->ByWh = $datos['ByWh'];
                $this->WTLiable = $datos['WTLiable'];
                $this->InvntryUom = utf8_decode($datos['InvntryUom'] ?? '');
                $this->PlaningSys = $datos['PlaningSys'];
                $this->OrdrIntrvl = $datos['OrdrIntrvl'];
                $this->OrdrMulti = $datos['OrdrMulti'];
                $this->MinOrdrQty = $datos['MinOrdrQty'];
                $this->LeadTime = $datos['LeadTime'];
                $this->IndirctTax = $datos['IndirctTax'];
                $this->TaxCodeAR = $datos['TaxCodeAR'];
                $this->TaxCodeAP = $datos['TaxCodeAP'];
                $this->UserSign2 = $datos['UserSign2'] ?? '1';
                $this->ToleranDay = $datos['ToleranDay'];
                $this->NoDiscount = $datos['NoDiscount'];
                $this->IWeight1 = $datos['IWeight1'] ?? '';
                $this->CreateTS = $datos['CreateTS'] ?? '';
                $this->UpdateTS = $datos['UpdateTS'] ?? '';
                $this->U_HBT_PRECIOXM2 = $datos['U_HBT_PRECIOXM2'];
                $this->U_HBT_FAMILIA = $datos['U_HBT_FAMILIA'];
                $this->U_HBT_CATEGORIA = $datos['U_HBT_CATEGORIA'];
                $this->U_HBT_LINEA = $datos['U_HBT_LINEA'];
                $this->U_HBT_TIPOLISTA = $datos['U_HBT_TIPOLISTA'];
                $this->U_HBT_CODIGOTAB = $datos['U_HBT_CODIGOTAB'];
                $this->U_U_HBT_TABDTOGRU = $datos['U_U_HBT_TABDTOGRU'];
                $this->U_HBT_PREBASE = $datos['U_HBT_PREBASE'];
                $this->U_HBT_DTOPROV = $datos['U_HBT_DTOPROV'];
                $this->U_HBT_COSBASE = $datos['U_HBT_COSBASE'];
                $this->U_HBT_PORGASTOS = $datos['U_HBT_PORGASTOS'];
                $this->U_HBT_COSESTIMADO = $datos['U_HBT_COSESTIMADO'];
                $this->U_HBT_MARGENMIN = $datos['U_HBT_MARGENMIN'];
                $this->U_HBT_PORINCRE = $datos['U_HBT_PORINCRE'];
                $this->U_HBT_MUTIL = $datos['U_HBT_MUTIL'];
                $this->U_HBT_DTOMAX = $datos['U_HBT_DTOMAX'];
                $this->U_HBT_pvmc = $datos['U_HBT_pvmc'];
                $this->U_HBT_PVMP = $datos['U_HBT_PVMP'];
                $this->U_HBT_MUPVMP = $datos['U_HBT_MUPVMP'];
                $this->U_HBT_MUpvmc = $datos['U_HBT_MUpvmc'];
                $this->U_U_HBT_COSPROM = $datos['U_U_HBT_COSPROM'];
                $this->U_HBT_FLETES = $datos['U_HBT_FLETES'];
                $this->U_HBT_VRGASTOS = $datos['U_HBT_VRGASTOS'];
                $this->U_HBT_TABDTOADI = $datos['U_HBT_TABDTOADI'];
                $this->U_HBT_FSMIN = $datos['U_HBT_FSMIN'];
                $this->U_HBT_FSMAX = $datos['U_HBT_FSMAX'];
                $this->U_HBT_USOCOSPROM = $datos['U_HBT_USOCOSPROM'];
                $this->U_HBT_FecIniDto = $datos['U_HBT_FecIniDto'];
                $this->U_HBT_FecFinDto = $datos['U_HBT_FecFinDto'];
                $this->U_HBT_NDTOMAX = $datos['U_HBT_NDTOMAX'];
                $this->U_HBT_MENSAJEMP = $datos['U_HBT_MENSAJEMP'];
                $this->U_HBT_NomPlanograma = $datos['U_HBT_NomPlanograma'];
                $this->U_HBT_UsuarioP1 = utf8_decode($datos['U_HBT_UsuarioP1']);
                $this->U_HBT_UsuarioP2 = utf8_decode($datos['U_HBT_UsuarioP2']);
                $this->U_HBT_UsuarioP3 = utf8_decode($datos['U_HBT_UsuarioP3']);
                $this->U_HBT_LAYOUT = utf8_decode($datos['U_HBT_LAYOUT']);
                $this->U_HBT_ROL = $datos['U_HBT_ROL'];
                $this->U_HBT_Especialidad = $datos['U_HBT_Especialidad'];
                $this->U_HBT_DtoAdicional = $datos['U_HBT_DtoAdicional'];
                $this->U_HBT_CODIGODET = $datos['U_HBT_CODIGODET'];
                $this->U_HBT_PREPARACION = $datos['U_HBT_PREPARACION'];
                $this->U_HBT_SERENVIOS = $datos['U_HBT_SERENVIOS'];
                $this->U_HBT_ACTTRANSNAC = $datos['U_HBT_ACTTRANSNAC'];
                $this->U_HBT_DESCCOMART = $datos['U_HBT_DESCCOMART'];
                $this->U_HBT_ACTMAGENTO = $datos['U_HBT_ACTMAGENTO'];
                $this->U_HBT_ACTMAGENTOB2B = $datos['U_HBT_ACTMAGENTOB2B'];
                $this->U_HBT_ACTMAGENTOB2C = $datos['U_HBT_ACTMAGENTOB2C'];
                $this->U_HBT_PROVCORONA = $datos['U_HBT_PROVCORONA'];
                $this->U_HBT_Alineaprov = utf8_decode($datos['U_HBT_Alineaprov']);
                $this->U_HBT_PlanoIntroDist = $datos['U_HBT_PlanoIntroDist'];
                $this->U_HBT_PlanoIntroSV = $datos['U_HBT_PlanoIntroSV'];
                $this->U_HBT_PlanoIntroConst = $datos['U_HBT_PlanoIntroConst'];
                $this->U_HBT_PlanoIntroInfra = $datos['U_HBT_PlanoIntroInfra'];
                $this->U_HBT_Marquilla = utf8_decode($datos['U_HBT_Marquilla']);
                $this->U_HBT_PlanoIntroDistFE = $datos['U_HBT_PlanoIntroDistFE'];
                $this->U_HBT_PORTAFOLIO = $datos['U_HBT_PORTAFOLIO'];
                $this->U_HBT_DTOADIPROV = $datos['U_HBT_DTOADIPROV'];
                $this->U_HBT_FECDTOADIPRO = $datos['U_HBT_FECDTOADIPRO'];
                $this->U_HBT_COSTOPRODUCTO = $datos['U_HBT_COSTOPRODUCTO'];
            } else {
                // Consulta SQL para obtener datos por código
                $stringSQL = "SELECT \"ItemCode\", \"ItemName\", \"FrgnName\", \"ItmsGrpCod\", \"CstGrpCode\", \"VatGourpSa\", \"CodeBars\", \"VATLiable\", \"PrchseItem\", \"SellItem\", \"InvntItem\", \"OnHand\", \"IsCommited\", \"OnOrder\", \"IncomeAcct\", \"ExmptIncom\", \"MaxLevel\", \"DfltWH\", \"CardCode\", \"SuppCatNum\", \"BuyUnitMsr\", \"NumInBuy\", \"ReorderQty\", \"MinLevel\", \"LstEvlPric\", \"LstEvlDate\", \"CustomPer\", \"Canceled\", \"MnufctTime\", \"WholSlsTax\", \"RetilrTax\", \"SpcialDisc\", \"DscountCod\", \"TrackSales\", \"SalUnitMsr\", \"NumInSale\", \"Consig\", \"QueryGroup\", \"Counted\", \"OpenBlnc\", \"EvalSystem\", \"UserSign\", \"FREE\", \"PicturName\", \"Transfered\", \"BlncTrnsfr\", \"UserText\", \"SerialNum\", \"CommisPcnt\", \"CommisSum\", \"CommisGrp\", \"TreeType\", \"TreeQty\", \"LastPurPrc\", \"LastPurCur\", \"LastPurDat\", \"ExitCur\", \"ExitPrice\", \"ExitWH\", \"AssetItem\", \"WasCounted\", \"ManSerNum\", \"SHeight1\", \"SHght1Unit\", \"SHeight2\", \"SHght2Unit\", \"SWidth1\", \"SWdth1Unit\", \"SWidth2\", \"SWdth2Unit\", \"SLength1\", \"SLen1Unit\", \"Slength2\", \"SLen2Unit\", \"SVolume\", \"SVolUnit\", \"SWeight1\", \"SWght1Unit\", \"SWeight2\", \"SWght2Unit\", \"BHeight1\", \"BHght1Unit\", \"BHeight2\", \"BHght2Unit\", \"BWidth1\", \"BWdth1Unit\", \"BWidth2\", \"BWdth2Unit\", \"BLength1\", \"BLen1Unit\", \"Blength2\", \"BLen2Unit\", \"BVolume\", \"BVolUnit\", \"BWeight1\", \"BWght1Unit\", \"BWeight2\", \"BWght2Unit\", \"FixCurrCms\", \"FirmCode\", \"LstSalDate\", \"QryGroup1\", \"QryGroup2\", \"QryGroup3\", \"QryGroup4\", \"QryGroup5\", \"QryGroup6\", \"QryGroup7\", \"QryGroup8\", \"QryGroup9\", \"QryGroup10\", \"QryGroup11\", \"QryGroup12\", \"QryGroup13\", \"QryGroup14\", \"QryGroup15\", \"QryGroup16\", \"QryGroup17\", \"QryGroup18\", \"QryGroup19\", \"QryGroup20\", \"QryGroup21\", \"QryGroup22\", \"QryGroup23\", \"QryGroup24\", \"QryGroup25\", \"QryGroup26\", \"QryGroup27\", \"QryGroup28\", \"QryGroup29\", \"QryGroup30\", \"QryGroup31\", \"QryGroup32\", \"QryGroup33\", \"QryGroup34\", \"QryGroup35\", \"QryGroup36\", \"QryGroup37\", \"QryGroup38\", \"QryGroup39\", \"QryGroup40\", \"QryGroup41\", \"QryGroup42\", \"QryGroup43\", \"QryGroup44\", \"QryGroup45\", \"QryGroup46\", \"QryGroup47\", \"QryGroup48\", \"QryGroup49\", \"QryGroup50\", \"QryGroup51\", \"QryGroup52\", \"QryGroup53\", \"QryGroup54\", \"QryGroup55\", \"QryGroup56\", \"QryGroup57\", \"QryGroup58\", \"QryGroup59\", \"QryGroup60\", \"QryGroup61\", \"QryGroup62\", \"QryGroup63\", \"QryGroup64\", \"CreateDate\", \"UpdateDate\", \"ExportCode\", \"SalFactor1\", \"SalFactor2\", \"SalFactor3\", \"SalFactor4\", \"PurFactor1\", \"PurFactor2\", \"PurFactor3\", \"PurFactor4\", \"SalFormula\", \"PurFormula\", \"VatGroupPu\", \"AvgPrice\", \"PurPackMsr\", \"PurPackUn\", \"SalPackMsr\", \"SalPackUn\", \"SCNCounter\", \"ManBtchNum\", \"ManOutOnly\", \"DataSource\", \"validFor\", \"validFrom\", \"validTo\", \"frozenFor\", \"frozenFrom\", \"frozenTo\", \"BlockOut\", \"ValidComm\", \"FrozenComm\", \"LogInstanc\", \"ObjType\", \"SWW\", \"Deleted\", \"DocEntry\", \"ExpensAcct\", \"FrgnInAcct\", \"ShipType\", \"GLMethod\", \"ECInAcct\", \"FrgnExpAcc\", \"ECExpAcc\", \"TaxType\", \"ByWh\", \"WTLiable\", \"ItemType\", \"WarrntTmpl\", \"BaseUnit\", \"CountryOrg\", \"StockValue\", \"Phantom\", \"IssueMthd\", \"FREE1\", \"PricingPrc\", \"MngMethod\", \"ReorderPnt\", \"InvntryUom\", \"PlaningSys\", \"PrcrmntMtd\", \"OrdrIntrvl\", \"OrdrMulti\", \"MinOrdrQty\", \"LeadTime\", \"IndirctTax\", \"TaxCodeAR\", \"TaxCodeAP\", \"OSvcCode\", \"ISvcCode\", \"ServiceGrp\", \"NCMCode\", \"MatType\", \"MatGrp\", \"ProductSrc\", \"ServiceCtg\", \"ItemClass\", \"Excisable\", \"ChapterID\", \"NotifyASN\", \"ProAssNum\", \"AssblValue\", \"DNFEntry\", \"UserSign2\", \"Spec\", \"TaxCtg\", \"Series\", \"Number\", \"FuelCode\", \"BeverTblC\", \"BeverGrpC\", \"BeverTM\", \"Attachment\", \"AtcEntry\", \"ToleranDay\", \"UgpEntry\", \"PUoMEntry\", \"SUoMEntry\", \"IUoMEntry\", \"IssuePriBy\", \"AssetClass\", \"AssetGroup\", \"InventryNo\", \"Technician\", \"Employee\", \"Location\", \"StatAsset\", \"Cession\", \"DeacAftUL\", \"AsstStatus\", \"CapDate\", \"AcqDate\", \"RetDate\", \"GLPickMeth\", \"NoDiscount\", \"MgrByQty\", \"AssetRmk1\", \"AssetRmk2\", \"AssetAmnt1\", \"AssetAmnt2\", \"DeprGroup\", \"AssetSerNo\", \"CntUnitMsr\", \"NumInCnt\", \"INUoMEntry\", \"OneBOneRec\", \"RuleCode\", \"ScsCode\", \"SpProdType\", \"IWeight1\", \"IWght1Unit\", \"IWeight2\", \"IWght2Unit\", \"CompoWH\", \"CreateTS\", \"UpdateTS\", \"VirtAstItm\", \"SouVirAsst\", \"InCostRoll\", \"PrdStdCst\", \"EnAstSeri\", \"LinkRsc\", \"OnHldPert\", \"onHldLimt\", \"PriceUnit\", \"GSTRelevnt\", \"SACEntry\", \"GstTaxCtg\", \"AssVal4WTR\", \"ExcImpQUoM\", \"ExcFixAmnt\", \"ExcRate\", \"SOIExc\", \"TNVED\", \"Imported\", \"AutoBatch\", \"CstmActing\", \"StdItemId\", \"CommClass\", \"TaxCatCode\", \"DataVers\", \"NVECode\", \"CESTCode\", \"CtrSealQty\", \"LegalText\", \"QRCodeSrc\", \"Traceable\", \"U_HBT_TerceroFacPro\", \"U_HBT_TerceroAmorti\", \"U_HBT_TerceroBaja\", \"U_IFRS_TERM\", \"U_IFRS_VENT\", \"U_IFRS_MARK\", \"U_IFRS_GTIA\", \"U_IFRS_Tiempo\", \"U_IFRS_ActPadre\", \"U_HBT_FecPoliza\", \"U_HBT_FecVtoGarn\", \"U_HBT_FecMantto\", \"U_IFRS_Tipo\", \"U_IFRS_EXCDET\", \"U_IFRS_TipoAF\", \"U_HBT_CANTM2\", \"U_HBT_PRECIOXM2\", \"U_HBT_FECHA_AR\", \"U_HBT_FAMILIA\", \"U_HBT_CATEGORIA\", \"U_HBT_LINEA\", \"U_HBT_TIPOLISTA\", \"U_HBT_CODIGOTAB\", \"U_U_HBT_TABDTOGRU\", \"U_HBT_PREBASE\", \"U_HBT_DTOPROV\", \"U_HBT_COSBASE\", \"U_HBT_PORGASTOS\", \"U_HBT_COSESTIMADO\", \"U_HBT_MARGENMIN\", \"U_HBT_PORINCRE\", \"U_HBT_MUTIL\", \"U_HBT_DTOMAX\", \"U_HBT_pvmc\", \"U_HBT_PVMP\", \"U_HBT_MUPVMP\", \"U_HBT_MUpvmc\", \"U_U_HBT_COSPROM\", \"U_HBT_FLETES\", \"U_HBT_FVOLUMEN\", \"U_HBT_DTOFAB\", \"U_HBT_CONCEPTO\", \"U_HBT_VRGASTOS\", \"U_PLU\", \"U_HBT_CodigoProducto\", \"U_HBT_TABDTOADI\", \"U_HBT_CodProductoFE\", \"U_HBT_POSICION\", \"U_HBT_CLASIFICACION\", \"U_HBT_CodVendedor\", \"U_HBT_AplicaAIU\", \"U_HBT_SUBGRUPO\", \"U_HBT_FSMIN\", \"U_HBT_FSMAX\", \"U_HBT_Modelo\", \"U_HBT_Marca\", \"U_HBT_BolsaPlas\", \"U_HBT_COMPENSACION\", \"U_HBT_VRCOMPENSACION\", \"U_HBT_USOCOSPROM\", \"U_HBT_FecIniDto\", \"U_HBT_FecFinDto\", \"U_HBT_NDTOMAX\", \"U_HBT_MENSAJEMP\", \"U_HBT_NomPlanograma\", \"U_HBT_PlanoDominante\", \"U_HBT_PlanoCompet\", \"U_HBT_UsuarioP1\", \"U_HBT_UsuarioP2\", \"U_HBT_UsuarioP3\", \"U_HBT_LAYOUT\", \"U_HBT_ROL\", \"U_HBT_Especialidad\", \"U_HBT_DtoAdicional\", \"U_HBT_CODIGODET\", \"U_HBT_PREPARACION\", \"U_HBT_SERENVIOS\", \"U_HBT_ACTTRANSNAC\", \"U_HBT_DESCCOMART\", \"U_HBT_ACTMAGENTO\", \"U_HBT_ACTMAGENTOB2B\", \"U_HBT_ACTMAGENTOB2C\", \"U_HBT_FirmCode\", \"U_HBT_PROVCORONA\", \"U_HBT_Alineaprov\", \"U_HBT_PlanoIntroDist\", \"U_HBT_PlanoIntroSV\", \"U_HBT_PlanoIntroConst\", \"U_HBT_PlanoIntroInfra\", \"U_HBT_Marquilla\", \"U_HBT_PlanoIntroSVFE\", \"U_HBT_PlanoIntroDistFE\", \"U_HBT_PORTAFOLIO\", \"U_HBT_DTOADIPROV\", \"U_HBT_FECDTOADIPRO\", \"U_HBT_COSTOPRODUCTO\", \"U_HBT_APLICADTOADIPRO\", \"U_HBT_COMPRADOR\", \"U_HBT_ValIBUA\", \"U_HBT_CantML\", \"U_HBT_ValINPP\", \"U_HBT_CantINPP\", \"U_HBT_ValICL\", \"U_HBT_CantICL\", \"U_HBT_BaseADV\" 
                              FROM \"SBOCASAANDINA\".\"OITM\" 
                              WHERE \"ItemCode\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->ItemCode = $result[0]['ItemCode'];
                    $this->ItemName = utf8_encode($result[0]['ItemName']);
                    $this->FrgnName = utf8_encode($result[0]['FrgnName']);
                    $this->ItmsGrpCod = $result[0]['ItmsGrpCod'];
                    $this->CodeBars = $result[0]['CodeBars'];
                    $this->PrchseItem = $result[0]['PrchseItem'];
                    $this->SellItem = $result[0]['SellItem'];
                    $this->InvntItem = $result[0]['InvntItem'];
                    $this->CardCode = $result[0]['CardCode'];
                    $this->SuppCatNum = $result[0]['SuppCatNum'];
                    $this->BuyUnitMsr = utf8_encode($result[0]['BuyUnitMsr']);
                    $this->NumInBuy = $result[0]['NumInBuy'];
                    $this->SalUnitMsr = utf8_encode($result[0]['SalUnitMsr']);
                    $this->NumInSale = $result[0]['NumInSale'];
                    $this->UserSign = $result[0]['UserSign'];
                    $this->PicturName = utf8_encode($result[0]['PicturName']);
                    $this->UserText = utf8_encode($result[0]['UserText']);
                    $this->SHeight1 = $result[0]['SHeight1'];
                    $this->SWidth1 = $result[0]['SWidth1'];
                    $this->SLength1 = $result[0]['SLength1'];
                    $this->SVolume = $result[0]['SVolume'];
                    $this->SVolUnit = $result[0]['SVolUnit'];
                    $this->SWeight1 = $result[0]['SWeight1'];
                    $this->BHeight1 = $result[0]['BHeight1'];
                    $this->BWidth1 = $result[0]['BWidth1'];
                    $this->BLength1 = $result[0]['BLength1'];
                    $this->BVolume = $result[0]['BVolume'];
                    $this->BVolUnit = $result[0]['BVolUnit'];
                    $this->BWeight1 = $result[0]['BWeight1'];
                    $this->FirmCode = $result[0]['FirmCode'];
                    $this->QryGroup1 = $result[0]['QryGroup1'];
                    $this->QryGroup2 = $result[0]['QryGroup2'];
                    $this->QryGroup3 = $result[0]['QryGroup3'];
                    $this->QryGroup4 = $result[0]['QryGroup4'];
                    $this->QryGroup5 = $result[0]['QryGroup5'];
                    $this->QryGroup6 = $result[0]['QryGroup6'];
                    $this->QryGroup7 = $result[0]['QryGroup7'];
                    $this->QryGroup8 = $result[0]['QryGroup8'];
                    $this->QryGroup9 = $result[0]['QryGroup9'];
                    $this->QryGroup10 = $result[0]['QryGroup10'];
                    $this->QryGroup11 = $result[0]['QryGroup11'];
                    $this->QryGroup12 = $result[0]['QryGroup12'];
                    $this->QryGroup13 = $result[0]['QryGroup13'];
                    $this->QryGroup14 = $result[0]['QryGroup14'];
                    $this->QryGroup15 = $result[0]['QryGroup15'];
                    $this->QryGroup16 = $result[0]['QryGroup16'];
                    $this->QryGroup17 = $result[0]['QryGroup17'];
                    $this->QryGroup18 = $result[0]['QryGroup18'];
                    $this->QryGroup19 = $result[0]['QryGroup19'];
                    $this->QryGroup20 = $result[0]['QryGroup20'];
                    $this->QryGroup21 = $result[0]['QryGroup21'];
                    $this->QryGroup22 = $result[0]['QryGroup22'];
                    $this->QryGroup23 = $result[0]['QryGroup23'];
                    $this->QryGroup24 = $result[0]['QryGroup24'];
                    $this->QryGroup25 = $result[0]['QryGroup25'];
                    $this->QryGroup26 = $result[0]['QryGroup26'];
                    $this->QryGroup27 = $result[0]['QryGroup27'];
                    $this->QryGroup28 = $result[0]['QryGroup28'];
                    $this->QryGroup29 = $result[0]['QryGroup29'];
                    $this->QryGroup30 = $result[0]['QryGroup30'];
                    $this->QryGroup31 = $result[0]['QryGroup31'];
                    $this->QryGroup32 = $result[0]['QryGroup32'];
                    $this->QryGroup33 = $result[0]['QryGroup33'];
                    $this->QryGroup34 = $result[0]['QryGroup34'];
                    $this->QryGroup35 = $result[0]['QryGroup35'];
                    $this->QryGroup36 = $result[0]['QryGroup36'];
                    $this->QryGroup37 = $result[0]['QryGroup37'];
                    $this->QryGroup38 = $result[0]['QryGroup38'];
                    $this->QryGroup39 = $result[0]['QryGroup39'];
                    $this->QryGroup40 = $result[0]['QryGroup40'];
                    $this->QryGroup41 = $result[0]['QryGroup41'];
                    $this->QryGroup42 = $result[0]['QryGroup42'];
                    $this->QryGroup43 = $result[0]['QryGroup43'];
                    $this->QryGroup44 = $result[0]['QryGroup44'];
                    $this->QryGroup45 = $result[0]['QryGroup45'];
                    $this->QryGroup46 = $result[0]['QryGroup46'];
                    $this->QryGroup47 = $result[0]['QryGroup47'];
                    $this->QryGroup48 = $result[0]['QryGroup48'];
                    $this->QryGroup49 = $result[0]['QryGroup49'];
                    $this->QryGroup50 = $result[0]['QryGroup50'];
                    $this->QryGroup51 = $result[0]['QryGroup51'];
                    $this->QryGroup52 = $result[0]['QryGroup52'];
                    $this->QryGroup53 = $result[0]['QryGroup53'];
                    $this->QryGroup54 = $result[0]['QryGroup54'];
                    $this->QryGroup55 = $result[0]['QryGroup55'];
                    $this->QryGroup56 = $result[0]['QryGroup56'];
                    $this->QryGroup57 = $result[0]['QryGroup57'];
                    $this->QryGroup58 = $result[0]['QryGroup58'];
                    $this->QryGroup59 = $result[0]['QryGroup59'];
                    $this->QryGroup60 = $result[0]['QryGroup60'];
                    $this->QryGroup61 = $result[0]['QryGroup61'];
                    $this->QryGroup62 = $result[0]['QryGroup62'];
                    $this->QryGroup63 = $result[0]['QryGroup63'];
                    $this->QryGroup64 = $result[0]['QryGroup64'];
                    $this->CreateDate = $result[0]['CreateDate'];
                    $this->UpdateDate = $result[0]['UpdateDate'];
                    $this->PurPackMsr = utf8_encode($result[0]['PurPackMsr']);
                    $this->PurPackUn = $result[0]['PurPackUn'];
                    $this->SalPackMsr = utf8_encode($result[0]['SalPackMsr']);
                    $this->SalPackUn = $result[0]['SalPackUn'];
                    $this->validFor = $result[0]['validFor'];
                    $this->frozenFor = $result[0]['frozenFor'];
                    $this->SWW = $result[0]['SWW'];
                    $this->DocEntry = $result[0]['DocEntry'];
                    $this->ShipType = $result[0]['ShipType'];
                    $this->ByWh = $result[0]['ByWh'];
                    $this->WTLiable = $result[0]['WTLiable'];
                    $this->InvntryUom = utf8_encode($result[0]['InvntryUom']);
                    $this->PlaningSys = $result[0]['PlaningSys'];
                    $this->OrdrIntrvl = $result[0]['OrdrIntrvl'];
                    $this->OrdrMulti = $result[0]['OrdrMulti'];
                    $this->MinOrdrQty = $result[0]['MinOrdrQty'];
                    $this->LeadTime = $result[0]['LeadTime'];
                    $this->IndirctTax = $result[0]['IndirctTax'];
                    $this->TaxCodeAR = $result[0]['TaxCodeAR'];
                    $this->TaxCodeAP = $result[0]['TaxCodeAP'];
                    $this->UserSign2 = $result[0]['UserSign2'];
                    $this->ToleranDay = $result[0]['ToleranDay'];
                    $this->NoDiscount = $result[0]['NoDiscount'];
                    $this->IWeight1 = $result[0]['IWeight1'];
                    $this->CreateTS = $result[0]['CreateTS'];
                    $this->UpdateTS = $result[0]['UpdateTS'];
                    $this->U_HBT_PRECIOXM2 = $result[0]['U_HBT_PRECIOXM2'];
                    $this->U_HBT_FAMILIA = $result[0]['U_HBT_FAMILIA'];
                    $this->U_HBT_CATEGORIA = $result[0]['U_HBT_CATEGORIA'];
                    $this->U_HBT_LINEA = $result[0]['U_HBT_LINEA'];
                    $this->U_HBT_TIPOLISTA = $result[0]['U_HBT_TIPOLISTA'];
                    $this->U_HBT_CODIGOTAB = $result[0]['U_HBT_CODIGOTAB'];
                    $this->U_U_HBT_TABDTOGRU = $result[0]['U_U_HBT_TABDTOGRU'];
                    $this->U_HBT_PREBASE = $result[0]['U_HBT_PREBASE'];
                    $this->U_HBT_DTOPROV = $result[0]['U_HBT_DTOPROV'];
                    $this->U_HBT_COSBASE = $result[0]['U_HBT_COSBASE'];
                    $this->U_HBT_PORGASTOS = $result[0]['U_HBT_PORGASTOS'];
                    $this->U_HBT_COSESTIMADO = $result[0]['U_HBT_COSESTIMADO'];
                    $this->U_HBT_MARGENMIN = $result[0]['U_HBT_MARGENMIN'];
                    $this->U_HBT_PORINCRE = $result[0]['U_HBT_PORINCRE'];
                    $this->U_HBT_MUTIL = $result[0]['U_HBT_MUTIL'];
                    $this->U_HBT_DTOMAX = $result[0]['U_HBT_DTOMAX'];
                    $this->U_HBT_pvmc = $result[0]['U_HBT_pvmc'];
                    $this->U_HBT_PVMP = $result[0]['U_HBT_PVMP'];
                    $this->U_HBT_MUPVMP = $result[0]['U_HBT_MUPVMP'];
                    $this->U_HBT_MUpvmc = $result[0]['U_HBT_MUpvmc'];
                    $this->U_U_HBT_COSPROM = $result[0]['U_U_HBT_COSPROM'];
                    $this->U_HBT_FLETES = $result[0]['U_HBT_FLETES'];
                    $this->U_HBT_VRGASTOS = $result[0]['U_HBT_VRGASTOS'];
                    $this->U_HBT_TABDTOADI = $result[0]['U_HBT_TABDTOADI'];
                    $this->U_HBT_FSMIN = $result[0]['U_HBT_FSMIN'];
                    $this->U_HBT_FSMAX = $result[0]['U_HBT_FSMAX'];
                    $this->U_HBT_USOCOSPROM = $result[0]['U_HBT_USOCOSPROM'];
                    $this->U_HBT_FecIniDto = $result[0]['U_HBT_FecIniDto'];
                    $this->U_HBT_FecFinDto = $result[0]['U_HBT_FecFinDto'];
                    $this->U_HBT_NDTOMAX = $result[0]['U_HBT_NDTOMAX'];
                    $this->U_HBT_MENSAJEMP = $result[0]['U_HBT_MENSAJEMP'];
                    $this->U_HBT_NomPlanograma = $result[0]['U_HBT_NomPlanograma'];
                    $this->U_HBT_UsuarioP1 = utf8_encode($result[0]['U_HBT_UsuarioP1']);
                    $this->U_HBT_UsuarioP2 = utf8_encode($result[0]['U_HBT_UsuarioP2']);
                    $this->U_HBT_UsuarioP3 = utf8_encode($result[0]['U_HBT_UsuarioP3']);
                    $this->U_HBT_LAYOUT = utf8_encode($result[0]['U_HBT_LAYOUT']);
                    $this->U_HBT_ROL = $result[0]['U_HBT_ROL'];
                    $this->U_HBT_Especialidad = $result[0]['U_HBT_Especialidad'];
                    $this->U_HBT_DtoAdicional = $result[0]['U_HBT_DtoAdicional'];
                    $this->U_HBT_CODIGODET = $result[0]['U_HBT_CODIGODET'];
                    $this->U_HBT_PREPARACION = $result[0]['U_HBT_PREPARACION'];
                    $this->U_HBT_SERENVIOS = $result[0]['U_HBT_SERENVIOS'];
                    $this->U_HBT_ACTTRANSNAC = $result[0]['U_HBT_ACTTRANSNAC'];
                    $this->U_HBT_DESCCOMART = $result[0]['U_HBT_DESCCOMART'];
                    $this->U_HBT_ACTMAGENTO = $result[0]['U_HBT_ACTMAGENTO'];
                    $this->U_HBT_ACTMAGENTOB2B = $result[0]['U_HBT_ACTMAGENTOB2B'];
                    $this->U_HBT_ACTMAGENTOB2C = $result[0]['U_HBT_ACTMAGENTOB2C'];
                    $this->U_HBT_PROVCORONA = $result[0]['U_HBT_PROVCORONA'];
                    $this->U_HBT_Alineaprov = utf8_encode($result[0]['U_HBT_Alineaprov']);
                    $this->U_HBT_PlanoIntroDist = $result[0]['U_HBT_PlanoIntroDist'];
                    $this->U_HBT_PlanoIntroSV = $result[0]['U_HBT_PlanoIntroSV'];
                    $this->U_HBT_PlanoIntroConst = $result[0]['U_HBT_PlanoIntroConst'];
                    $this->U_HBT_PlanoIntroInfra = $result[0]['U_HBT_PlanoIntroInfra'];
                    $this->U_HBT_Marquilla = utf8_encode($result[0]['U_HBT_Marquilla']);
                    $this->U_HBT_PlanoIntroDistFE = $result[0]['U_HBT_PlanoIntroDistFE'];
                    $this->U_HBT_PORTAFOLIO = $result[0]['U_HBT_PORTAFOLIO'];
                    $this->U_HBT_DTOADIPROV = $result[0]['U_HBT_DTOADIPROV'];
                    $this->U_HBT_FECDTOADIPRO = $result[0]['U_HBT_FECDTOADIPRO'];
                    $this->U_HBT_COSTOPRODUCTO = $result[0]['U_HBT_COSTOPRODUCTO'];
                }
            }
        }
    }

    public function getItemCode()
    {
        return $this->ItemCode;
    }

    public function setItemCode($ItemCode)
    {
        $this->ItemCode = $ItemCode;
    }

    public function getItemName()
    {
        return $this->ItemName;
    }

    public function setItemName($ItemName)
    {
        $this->ItemName = $ItemName;
    }

    public function getFrgnName()
    {
        return $this->FrgnName;
    }

    public function setFrgnName($FrgnName)
    {
        $this->FrgnName = $FrgnName;
    }

    public function getItmsGrpCod()
    {
        return $this->ItmsGrpCod;
    }

    public function setItmsGrpCod($ItmsGrpCod)
    {
        $this->ItmsGrpCod = $ItmsGrpCod;
    }

    public function getCodeBars()
    {
        return $this->CodeBars;
    }

    public function setCodeBars($CodeBars)
    {
        $this->CodeBars = $CodeBars;
    }

    public function getPrchseItem()
    {
        return $this->PrchseItem;
    }

    public function setPrchseItem($PrchseItem)
    {
        $this->PrchseItem = $PrchseItem;
    }

    public function getSellItem()
    {
        return $this->SellItem;
    }

    public function setSellItem($SellItem)
    {
        $this->SellItem = $SellItem;
    }

    public function getInvntItem()
    {
        return $this->InvntItem;
    }

    public function setInvntItem($InvntItem)
    {
        $this->InvntItem = $InvntItem;
    }

    public function getCardCode()
    {
        return $this->CardCode;
    }

    public function setCardCode($CardCode)
    {
        $this->CardCode = $CardCode;
    }

    public function getSuppCatNum()
    {
        return $this->SuppCatNum;
    }

    public function setSuppCatNum($SuppCatNum)
    {
        $this->SuppCatNum = $SuppCatNum;
    }

    public function getBuyUnitMsr()
    {
        return $this->BuyUnitMsr;
    }

    public function setBuyUnitMsr($BuyUnitMsr)
    {
        $this->BuyUnitMsr = $BuyUnitMsr;
    }

    public function getNumInBuy()
    {
        return $this->NumInBuy;
    }

    public function setNumInBuy($NumInBuy)
    {
        $this->NumInBuy = $NumInBuy;
    }

    public function getSalUnitMsr()
    {
        return $this->SalUnitMsr;
    }

    public function setSalUnitMsr($SalUnitMsr)
    {
        $this->SalUnitMsr = $SalUnitMsr;
    }

    public function getNumInSale()
    {
        return $this->NumInSale;
    }

    public function setNumInSale($NumInSale)
    {
        $this->NumInSale = $NumInSale;
    }

    public function getUserSign()
    {
        return $this->UserSign;
    }

    public function setUserSign($UserSign)
    {
        $this->UserSign = $UserSign;
    }

    public function getPicturName()
    {
        return $this->PicturName;
    }

    public function setPicturName($PicturName)
    {
        $this->PicturName = $PicturName;
    }

    public function getUserText()
    {
        return $this->UserText;
    }

    public function setUserText($UserText)
    {
        $this->UserText = $UserText;
    }

    public function getSHeight1()
    {
        return $this->SHeight1;
    }

    public function setSHeight1($SHeight1)
    {
        $this->SHeight1 = $SHeight1;
    }

    public function getSWidth1()
    {
        return $this->SWidth1;
    }

    public function setSWidth1($SWidth1)
    {
        $this->SWidth1 = $SWidth1;
    }

    public function getSLength1()
    {
        return $this->SLength1;
    }

    public function setSLength1($SLength1)
    {
        $this->SLength1 = $SLength1;
    }

    public function getSVolume()
    {
        return $this->SVolume;
    }

    public function setSVolume($SVolume)
    {
        $this->SVolume = $SVolume;
    }

    public function getSVolUnit()
    {
        return $this->SVolUnit;
    }

    public function setSVolUnit($SVolUnit)
    {
        $this->SVolUnit = $SVolUnit;
    }

    public function getSWeight1()
    {
        return $this->SWeight1;
    }

    public function setSWeight1($SWeight1)
    {
        $this->SWeight1 = $SWeight1;
    }

    public function getBHeight1()
    {
        return $this->BHeight1;
    }

    public function setBHeight1($BHeight1)
    {
        $this->BHeight1 = $BHeight1;
    }

    public function getBWidth1()
    {
        return $this->BWidth1;
    }

    public function setBWidth1($BWidth1)
    {
        $this->BWidth1 = $BWidth1;
    }

    public function getBLength1()
    {
        return $this->BLength1;
    }

    public function setBLength1($BLength1)
    {
        $this->BLength1 = $BLength1;
    }

    public function getBVolume()
    {
        return $this->BVolume;
    }

    public function setBVolume($BVolume)
    {
        $this->BVolume = $BVolume;
    }

    public function getBVolUnit()
    {
        return $this->BVolUnit;
    }

    public function setBVolUnit($BVolUnit)
    {
        $this->BVolUnit = $BVolUnit;
    }

    public function getBWeight1()
    {
        return $this->BWeight1;
    }

    public function setBWeight1($BWeight1)
    {
        $this->BWeight1 = $BWeight1;
    }

    public function getFirmCode()
    {
        return $this->FirmCode;
    }

    public function setFirmCode($FirmCode)
    {
        $this->FirmCode = $FirmCode;
    }

    public function getQryGroup1()
    {
        return $this->QryGroup1;
    }

    public function setQryGroup1($QryGroup1)
    {
        $this->QryGroup1 = $QryGroup1;
    }

    public function getQryGroup2()
    {
        return $this->QryGroup2;
    }

    public function setQryGroup2($QryGroup2)
    {
        $this->QryGroup2 = $QryGroup2;
    }

    public function getQryGroup3()
    {
        return $this->QryGroup3;
    }

    public function setQryGroup3($QryGroup3)
    {
        $this->QryGroup3 = $QryGroup3;
    }

    public function getQryGroup4()
    {
        return $this->QryGroup4;
    }

    public function setQryGroup4($QryGroup4)
    {
        $this->QryGroup4 = $QryGroup4;
    }

    public function getQryGroup5()
    {
        return $this->QryGroup5;
    }

    public function setQryGroup5($QryGroup5)
    {
        $this->QryGroup5 = $QryGroup5;
    }

    public function getQryGroup6()
    {
        return $this->QryGroup6;
    }

    public function setQryGroup6($QryGroup6)
    {
        $this->QryGroup6 = $QryGroup6;
    }

    public function getQryGroup7()
    {
        return $this->QryGroup7;
    }

    public function setQryGroup7($QryGroup7)
    {
        $this->QryGroup7 = $QryGroup7;
    }

    public function getQryGroup8()
    {
        return $this->QryGroup8;
    }

    public function setQryGroup8($QryGroup8)
    {
        $this->QryGroup8 = $QryGroup8;
    }

    public function getQryGroup9()
    {
        return $this->QryGroup9;
    }

    public function setQryGroup9($QryGroup9)
    {
        $this->QryGroup9 = $QryGroup9;
    }

    public function getQryGroup10()
    {
        return $this->QryGroup10;
    }

    public function setQryGroup10($QryGroup10)
    {
        $this->QryGroup10 = $QryGroup10;
    }

    public function getQryGroup11()
    {
        return $this->QryGroup11;
    }

    public function setQryGroup11($QryGroup11)
    {
        $this->QryGroup11 = $QryGroup11;
    }

    public function getQryGroup12()
    {
        return $this->QryGroup12;
    }

    public function setQryGroup12($QryGroup12)
    {
        $this->QryGroup12 = $QryGroup12;
    }

    public function getQryGroup13()
    {
        return $this->QryGroup13;
    }

    public function setQryGroup13($QryGroup13)
    {
        $this->QryGroup13 = $QryGroup13;
    }

    public function getQryGroup14()
    {
        return $this->QryGroup14;
    }

    public function setQryGroup14($QryGroup14)
    {
        $this->QryGroup14 = $QryGroup14;
    }

    public function getQryGroup15()
    {
        return $this->QryGroup15;
    }

    public function setQryGroup15($QryGroup15)
    {
        $this->QryGroup15 = $QryGroup15;
    }

    public function getQryGroup16()
    {
        return $this->QryGroup16;
    }

    public function setQryGroup16($QryGroup16)
    {
        $this->QryGroup16 = $QryGroup16;
    }

    public function getQryGroup17()
    {
        return $this->QryGroup17;
    }

    public function setQryGroup17($QryGroup17)
    {
        $this->QryGroup17 = $QryGroup17;
    }

    public function getQryGroup18()
    {
        return $this->QryGroup18;
    }

    public function setQryGroup18($QryGroup18)
    {
        $this->QryGroup18 = $QryGroup18;
    }

    public function getQryGroup19()
    {
        return $this->QryGroup19;
    }

    public function setQryGroup19($QryGroup19)
    {
        $this->QryGroup19 = $QryGroup19;
    }

    public function getQryGroup20()
    {
        return $this->QryGroup20;
    }

    public function setQryGroup20($QryGroup20)
    {
        $this->QryGroup20 = $QryGroup20;
    }

    public function getQryGroup21()
    {
        return $this->QryGroup21;
    }

    public function setQryGroup21($QryGroup21)
    {
        $this->QryGroup21 = $QryGroup21;
    }

    public function getQryGroup22()
    {
        return $this->QryGroup22;
    }

    public function setQryGroup22($QryGroup22)
    {
        $this->QryGroup22 = $QryGroup22;
    }

    public function getQryGroup23()
    {
        return $this->QryGroup23;
    }

    public function setQryGroup23($QryGroup23)
    {
        $this->QryGroup23 = $QryGroup23;
    }

    public function getQryGroup24()
    {
        return $this->QryGroup24;
    }

    public function setQryGroup24($QryGroup24)
    {
        $this->QryGroup24 = $QryGroup24;
    }

    public function getQryGroup25()
    {
        return $this->QryGroup25;
    }

    public function setQryGroup25($QryGroup25)
    {
        $this->QryGroup25 = $QryGroup25;
    }

    public function getQryGroup26()
    {
        return $this->QryGroup26;
    }

    public function setQryGroup26($QryGroup26)
    {
        $this->QryGroup26 = $QryGroup26;
    }

    public function getQryGroup27()
    {
        return $this->QryGroup27;
    }

    public function setQryGroup27($QryGroup27)
    {
        $this->QryGroup27 = $QryGroup27;
    }

    public function getQryGroup28()
    {
        return $this->QryGroup28;
    }

    public function setQryGroup28($QryGroup28)
    {
        $this->QryGroup28 = $QryGroup28;
    }

    public function getQryGroup29()
    {
        return $this->QryGroup29;
    }

    public function setQryGroup29($QryGroup29)
    {
        $this->QryGroup29 = $QryGroup29;
    }

    public function getQryGroup30()
    {
        return $this->QryGroup30;
    }

    public function setQryGroup30($QryGroup30)
    {
        $this->QryGroup30 = $QryGroup30;
    }

    public function getQryGroup31()
    {
        return $this->QryGroup31;
    }

    public function setQryGroup31($QryGroup31)
    {
        $this->QryGroup31 = $QryGroup31;
    }

    public function getQryGroup32()
    {
        return $this->QryGroup32;
    }

    public function setQryGroup32($QryGroup32)
    {
        $this->QryGroup32 = $QryGroup32;
    }

    public function getQryGroup33()
    {
        return $this->QryGroup33;
    }

    public function setQryGroup33($QryGroup33)
    {
        $this->QryGroup33 = $QryGroup33;
    }

    public function getQryGroup34()
    {
        return $this->QryGroup34;
    }

    public function setQryGroup34($QryGroup34)
    {
        $this->QryGroup34 = $QryGroup34;
    }

    public function getQryGroup35()
    {
        return $this->QryGroup35;
    }

    public function setQryGroup35($QryGroup35)
    {
        $this->QryGroup35 = $QryGroup35;
    }

    public function getQryGroup36()
    {
        return $this->QryGroup36;
    }

    public function setQryGroup36($QryGroup36)
    {
        $this->QryGroup36 = $QryGroup36;
    }

    public function getQryGroup37()
    {
        return $this->QryGroup37;
    }

    public function setQryGroup37($QryGroup37)
    {
        $this->QryGroup37 = $QryGroup37;
    }

    public function getQryGroup38()
    {
        return $this->QryGroup38;
    }

    public function setQryGroup38($QryGroup38)
    {
        $this->QryGroup38 = $QryGroup38;
    }

    public function getQryGroup39()
    {
        return $this->QryGroup39;
    }

    public function setQryGroup39($QryGroup39)
    {
        $this->QryGroup39 = $QryGroup39;
    }

    public function getQryGroup40()
    {
        return $this->QryGroup40;
    }

    public function setQryGroup40($QryGroup40)
    {
        $this->QryGroup40 = $QryGroup40;
    }

    public function getQryGroup41()
    {
        return $this->QryGroup41;
    }

    public function setQryGroup41($QryGroup41)
    {
        $this->QryGroup41 = $QryGroup41;
    }

    public function getQryGroup42()
    {
        return $this->QryGroup42;
    }

    public function setQryGroup42($QryGroup42)
    {
        $this->QryGroup42 = $QryGroup42;
    }

    public function getQryGroup43()
    {
        return $this->QryGroup43;
    }

    public function setQryGroup43($QryGroup43)
    {
        $this->QryGroup43 = $QryGroup43;
    }

    public function getQryGroup44()
    {
        return $this->QryGroup44;
    }

    public function setQryGroup44($QryGroup44)
    {
        $this->QryGroup44 = $QryGroup44;
    }

    public function getQryGroup45()
    {
        return $this->QryGroup45;
    }

    public function setQryGroup45($QryGroup45)
    {
        $this->QryGroup45 = $QryGroup45;
    }

    public function getQryGroup46()
    {
        return $this->QryGroup46;
    }

    public function setQryGroup46($QryGroup46)
    {
        $this->QryGroup46 = $QryGroup46;
    }

    public function getQryGroup47()
    {
        return $this->QryGroup47;
    }

    public function setQryGroup47($QryGroup47)
    {
        $this->QryGroup47 = $QryGroup47;
    }

    public function getQryGroup48()
    {
        return $this->QryGroup48;
    }

    public function setQryGroup48($QryGroup48)
    {
        $this->QryGroup48 = $QryGroup48;
    }

    public function getQryGroup49()
    {
        return $this->QryGroup49;
    }

    public function setQryGroup49($QryGroup49)
    {
        $this->QryGroup49 = $QryGroup49;
    }

    public function getQryGroup50()
    {
        return $this->QryGroup50;
    }

    public function setQryGroup50($QryGroup50)
    {
        $this->QryGroup50 = $QryGroup50;
    }

    public function getQryGroup51()
    {
        return $this->QryGroup51;
    }

    public function setQryGroup51($QryGroup51)
    {
        $this->QryGroup51 = $QryGroup51;
    }

    public function getQryGroup52()
    {
        return $this->QryGroup52;
    }

    public function setQryGroup52($QryGroup52)
    {
        $this->QryGroup52 = $QryGroup52;
    }

    public function getQryGroup53()
    {
        return $this->QryGroup53;
    }

    public function setQryGroup53($QryGroup53)
    {
        $this->QryGroup53 = $QryGroup53;
    }

    public function getQryGroup54()
    {
        return $this->QryGroup54;
    }

    public function setQryGroup54($QryGroup54)
    {
        $this->QryGroup54 = $QryGroup54;
    }

    public function getQryGroup55()
    {
        return $this->QryGroup55;
    }

    public function setQryGroup55($QryGroup55)
    {
        $this->QryGroup55 = $QryGroup55;
    }

    public function getQryGroup56()
    {
        return $this->QryGroup56;
    }

    public function setQryGroup56($QryGroup56)
    {
        $this->QryGroup56 = $QryGroup56;
    }

    public function getQryGroup57()
    {
        return $this->QryGroup57;
    }

    public function setQryGroup57($QryGroup57)
    {
        $this->QryGroup57 = $QryGroup57;
    }

    public function getQryGroup58()
    {
        return $this->QryGroup58;
    }

    public function setQryGroup58($QryGroup58)
    {
        $this->QryGroup58 = $QryGroup58;
    }

    public function getQryGroup59()
    {
        return $this->QryGroup59;
    }

    public function setQryGroup59($QryGroup59)
    {
        $this->QryGroup59 = $QryGroup59;
    }

    public function getQryGroup60()
    {
        return $this->QryGroup60;
    }

    public function setQryGroup60($QryGroup60)
    {
        $this->QryGroup60 = $QryGroup60;
    }

    public function getQryGroup61()
    {
        return $this->QryGroup61;
    }

    public function setQryGroup61($QryGroup61)
    {
        $this->QryGroup61 = $QryGroup61;
    }

    public function getQryGroup62()
    {
        return $this->QryGroup62;
    }

    public function setQryGroup62($QryGroup62)
    {
        $this->QryGroup62 = $QryGroup62;
    }

    public function getQryGroup63()
    {
        return $this->QryGroup63;
    }

    public function setQryGroup63($QryGroup63)
    {
        $this->QryGroup63 = $QryGroup63;
    }

    public function getQryGroup64()
    {
        return $this->QryGroup64;
    }

    public function setQryGroup64($QryGroup64)
    {
        $this->QryGroup64 = $QryGroup64;
    }

    public function getCreateDate()
    {
        return $this->CreateDate;
    }

    public function setCreateDate($CreateDate)
    {
        $this->CreateDate = $CreateDate;
    }

    public function getUpdateDate()
    {
        return $this->UpdateDate;
    }

    public function setUpdateDate($UpdateDate)
    {
        $this->UpdateDate = $UpdateDate;
    }

    public function getPurPackMsr()
    {
        return $this->PurPackMsr;
    }

    public function setPurPackMsr($PurPackMsr)
    {
        $this->PurPackMsr = $PurPackMsr;
    }

    public function getPurPackUn()
    {
        return $this->PurPackUn;
    }

    public function setPurPackUn($PurPackUn)
    {
        $this->PurPackUn = $PurPackUn;
    }

    public function getSalPackMsr()
    {
        return $this->SalPackMsr;
    }

    public function setSalPackMsr($SalPackMsr)
    {
        $this->SalPackMsr = $SalPackMsr;
    }

    public function getSalPackUn()
    {
        return $this->SalPackUn;
    }

    public function setSalPackUn($SalPackUn)
    {
        $this->SalPackUn = $SalPackUn;
    }

    public function getValidFor()
    {
        return $this->validFor;
    }

    public function setValidFor($validFor)
    {
        $this->validFor = $validFor;
    }

    public function getFrozenFor()
    {
        return $this->frozenFor;
    }

    public function setFrozenFor($frozenFor)
    {
        $this->frozenFor = $frozenFor;
    }

    public function getSWW()
    {
        return $this->SWW;
    }

    public function setSWW($SWW)
    {
        $this->SWW = $SWW;
    }

    public function getDocEntry()
    {
        return $this->DocEntry;
    }

    public function setDocEntry($DocEntry)
    {
        $this->DocEntry = $DocEntry;
    }

    public function getShipType()
    {
        return $this->ShipType;
    }

    public function setShipType($ShipType)
    {
        $this->ShipType = $ShipType;
    }

    public function getByWh()
    {
        return $this->ByWh;
    }

    public function setByWh($ByWh)
    {
        $this->ByWh = $ByWh;
    }

    public function getWTLiable()
    {
        return $this->WTLiable;
    }

    public function setWTLiable($WTLiable)
    {
        $this->WTLiable = $WTLiable;
    }

    public function getInvntryUom()
    {
        return $this->InvntryUom;
    }

    public function setInvntryUom($InvntryUom)
    {
        $this->InvntryUom = $InvntryUom;
    }

    public function getPlaningSys()
    {
        return $this->PlaningSys;
    }

    public function setPlaningSys($PlaningSys)
    {
        $this->PlaningSys = $PlaningSys;
    }

    public function getOrdrIntrvl()
    {
        return $this->OrdrIntrvl;
    }

    public function setOrdrIntrvl($OrdrIntrvl)
    {
        $this->OrdrIntrvl = $OrdrIntrvl;
    }

    public function getOrdrMulti()
    {
        return $this->OrdrMulti;
    }

    public function setOrdrMulti($OrdrMulti)
    {
        $this->OrdrMulti = $OrdrMulti;
    }

    public function getMinOrdrQty()
    {
        return $this->MinOrdrQty;
    }

    public function setMinOrdrQty($MinOrdrQty)
    {
        $this->MinOrdrQty = $MinOrdrQty;
    }

    public function getLeadTime()
    {
        return $this->LeadTime;
    }

    public function setLeadTime($LeadTime)
    {
        $this->LeadTime = $LeadTime;
    }

    public function getIndirctTax()
    {
        return $this->IndirctTax;
    }

    public function setIndirctTax($IndirctTax)
    {
        $this->IndirctTax = $IndirctTax;
    }

    public function getTaxCodeAR()
    {
        return $this->TaxCodeAR;
    }

    public function setTaxCodeAR($TaxCodeAR)
    {
        $this->TaxCodeAR = $TaxCodeAR;
    }

    public function getTaxCodeAP()
    {
        return $this->TaxCodeAP;
    }

    public function setTaxCodeAP($TaxCodeAP)
    {
        $this->TaxCodeAP = $TaxCodeAP;
    }

    public function getUserSign2()
    {
        return $this->UserSign2;
    }

    public function setUserSign2($UserSign2)
    {
        $this->UserSign2 = $UserSign2;
    }

    public function getToleranDay()
    {
        return $this->ToleranDay;
    }

    public function setToleranDay($ToleranDay)
    {
        $this->ToleranDay = $ToleranDay;
    }

    public function getNoDiscount()
    {
        return $this->NoDiscount;
    }

    public function setNoDiscount($NoDiscount)
    {
        $this->NoDiscount = $NoDiscount;
    }

    public function getIWeight1()
    {
        return $this->IWeight1;
    }

    public function setIWeight1($IWeight1)
    {
        $this->IWeight1 = $IWeight1;
    }

    public function getCreateTS()
    {
        return $this->CreateTS;
    }

    public function setCreateTS($CreateTS)
    {
        $this->CreateTS = $CreateTS;
    }

    public function getUpdateTS()
    {
        return $this->UpdateTS;
    }

    public function setUpdateTS($UpdateTS)
    {
        $this->UpdateTS = $UpdateTS;
    }

    public function getU_HBT_PRECIOXM2()
    {
        return $this->U_HBT_PRECIOXM2;
    }

    public function setU_HBT_PRECIOXM2($U_HBT_PRECIOXM2)
    {
        $this->U_HBT_PRECIOXM2 = $U_HBT_PRECIOXM2;
    }

    public function getU_HBT_FAMILIA()
    {
        return $this->U_HBT_FAMILIA;
    }

    public function setU_HBT_FAMILIA($U_HBT_FAMILIA)
    {
        $this->U_HBT_FAMILIA = $U_HBT_FAMILIA;
    }

    public function getU_HBT_CATEGORIA()
    {
        return $this->U_HBT_CATEGORIA;
    }

    public function setU_HBT_CATEGORIA($U_HBT_CATEGORIA)
    {
        $this->U_HBT_CATEGORIA = $U_HBT_CATEGORIA;
    }

    public function getU_HBT_LINEA()
    {
        return $this->U_HBT_LINEA;
    }

    public function setU_HBT_LINEA($U_HBT_LINEA)
    {
        $this->U_HBT_LINEA = $U_HBT_LINEA;
    }

    public function getU_HBT_TIPOLISTA()
    {
        return $this->U_HBT_TIPOLISTA;
    }

    public function setU_HBT_TIPOLISTA($U_HBT_TIPOLISTA)
    {
        $this->U_HBT_TIPOLISTA = $U_HBT_TIPOLISTA;
    }

    public function getU_HBT_CODIGOTAB()
    {
        return $this->U_HBT_CODIGOTAB;
    }

    public function setU_HBT_CODIGOTAB($U_HBT_CODIGOTAB)
    {
        $this->U_HBT_CODIGOTAB = $U_HBT_CODIGOTAB;
    }

    public function getU_U_HBT_TABDTOGRU()
    {
        return $this->U_U_HBT_TABDTOGRU;
    }

    public function setU_U_HBT_TABDTOGRU($U_U_HBT_TABDTOGRU)
    {
        $this->U_U_HBT_TABDTOGRU = $U_U_HBT_TABDTOGRU;
    }

    public function getU_HBT_PREBASE()
    {
        return $this->U_HBT_PREBASE;
    }

    public function setU_HBT_PREBASE($U_HBT_PREBASE)
    {
        $this->U_HBT_PREBASE = $U_HBT_PREBASE;
    }

    public function getU_HBT_DTOPROV()
    {
        return $this->U_HBT_DTOPROV;
    }

    public function setU_HBT_DTOPROV($U_HBT_DTOPROV)
    {
        $this->U_HBT_DTOPROV = $U_HBT_DTOPROV;
    }

    public function getU_HBT_COSBASE()
    {
        return $this->U_HBT_COSBASE;
    }

    public function setU_HBT_COSBASE($U_HBT_COSBASE)
    {
        $this->U_HBT_COSBASE = $U_HBT_COSBASE;
    }

    public function getU_HBT_PORGASTOS()
    {
        return $this->U_HBT_PORGASTOS;
    }

    public function setU_HBT_PORGASTOS($U_HBT_PORGASTOS)
    {
        $this->U_HBT_PORGASTOS = $U_HBT_PORGASTOS;
    }

    public function getU_HBT_COSESTIMADO()
    {
        return $this->U_HBT_COSESTIMADO;
    }

    public function setU_HBT_COSESTIMADO($U_HBT_COSESTIMADO)
    {
        $this->U_HBT_COSESTIMADO = $U_HBT_COSESTIMADO;
    }

    public function getU_HBT_MARGENMIN()
    {
        return $this->U_HBT_MARGENMIN;
    }

    public function setU_HBT_MARGENMIN($U_HBT_MARGENMIN)
    {
        $this->U_HBT_MARGENMIN = $U_HBT_MARGENMIN;
    }

    public function getU_HBT_PORINCRE()
    {
        return $this->U_HBT_PORINCRE;
    }

    public function setU_HBT_PORINCRE($U_HBT_PORINCRE)
    {
        $this->U_HBT_PORINCRE = $U_HBT_PORINCRE;
    }

    public function getU_HBT_MUTIL()
    {
        return $this->U_HBT_MUTIL;
    }

    public function setU_HBT_MUTIL($U_HBT_MUTIL)
    {
        $this->U_HBT_MUTIL = $U_HBT_MUTIL;
    }

    public function getU_HBT_DTOMAX()
    {
        return $this->U_HBT_DTOMAX;
    }

    public function setU_HBT_DTOMAX($U_HBT_DTOMAX)
    {
        $this->U_HBT_DTOMAX = $U_HBT_DTOMAX;
    }

    public function getU_HBT_pvmc()
    {
        return $this->U_HBT_pvmc;
    }

    public function setU_HBT_pvmc($U_HBT_pvmc)
    {
        $this->U_HBT_pvmc = $U_HBT_pvmc;
    }

    public function getU_HBT_PVMP()
    {
        return $this->U_HBT_PVMP;
    }

    public function setU_HBT_PVMP($U_HBT_PVMP)
    {
        $this->U_HBT_PVMP = $U_HBT_PVMP;
    }

    public function getU_HBT_MUPVMP()
    {
        return $this->U_HBT_MUPVMP;
    }

    public function setU_HBT_MUPVMP($U_HBT_MUPVMP)
    {
        $this->U_HBT_MUPVMP = $U_HBT_MUPVMP;
    }

    public function getU_HBT_MUpvmc()
    {
        return $this->U_HBT_MUpvmc;
    }

    public function setU_HBT_MUpvmc($U_HBT_MUpvmc)
    {
        $this->U_HBT_MUpvmc = $U_HBT_MUpvmc;
    }

    public function getU_U_HBT_COSPROM()
    {
        return $this->U_U_HBT_COSPROM;
    }

    public function setU_U_HBT_COSPROM($U_U_HBT_COSPROM)
    {
        $this->U_U_HBT_COSPROM = $U_U_HBT_COSPROM;
    }

    public function getU_HBT_FLETES()
    {
        return $this->U_HBT_FLETES;
    }

    public function setU_HBT_FLETES($U_HBT_FLETES)
    {
        $this->U_HBT_FLETES = $U_HBT_FLETES;
    }

    public function getU_HBT_VRGASTOS()
    {
        return $this->U_HBT_VRGASTOS;
    }

    public function setU_HBT_VRGASTOS($U_HBT_VRGASTOS)
    {
        $this->U_HBT_VRGASTOS = $U_HBT_VRGASTOS;
    }

    public function getU_HBT_TABDTOADI()
    {
        return $this->U_HBT_TABDTOADI;
    }

    public function setU_HBT_TABDTOADI($U_HBT_TABDTOADI)
    {
        $this->U_HBT_TABDTOADI = $U_HBT_TABDTOADI;
    }

    public function getU_HBT_FSMIN()
    {
        return $this->U_HBT_FSMIN;
    }

    public function setU_HBT_FSMIN($U_HBT_FSMIN)
    {
        $this->U_HBT_FSMIN = $U_HBT_FSMIN;
    }

    public function getU_HBT_FSMAX()
    {
        return $this->U_HBT_FSMAX;
    }

    public function setU_HBT_FSMAX($U_HBT_FSMAX)
    {
        $this->U_HBT_FSMAX = $U_HBT_FSMAX;
    }

    public function getU_HBT_USOCOSPROM()
    {
        return $this->U_HBT_USOCOSPROM;
    }

    public function setU_HBT_USOCOSPROM($U_HBT_USOCOSPROM)
    {
        $this->U_HBT_USOCOSPROM = $U_HBT_USOCOSPROM;
    }

    public function getU_HBT_FecIniDto()
    {
        return $this->U_HBT_FecIniDto;
    }

    public function setU_HBT_FecIniDto($U_HBT_FecIniDto)
    {
        $this->U_HBT_FecIniDto = $U_HBT_FecIniDto;
    }

    public function getU_HBT_FecFinDto()
    {
        return $this->U_HBT_FecFinDto;
    }

    public function setU_HBT_FecFinDto($U_HBT_FecFinDto)
    {
        $this->U_HBT_FecFinDto = $U_HBT_FecFinDto;
    }

    public function getU_HBT_NDTOMAX()
    {
        return $this->U_HBT_NDTOMAX;
    }

    public function setU_HBT_NDTOMAX($U_HBT_NDTOMAX)
    {
        $this->U_HBT_NDTOMAX = $U_HBT_NDTOMAX;
    }

    public function getU_HBT_MENSAJEMP()
    {
        return $this->U_HBT_MENSAJEMP;
    }

    public function setU_HBT_MENSAJEMP($U_HBT_MENSAJEMP)
    {
        $this->U_HBT_MENSAJEMP = $U_HBT_MENSAJEMP;
    }

    public function getU_HBT_NomPlanograma()
    {
        return $this->U_HBT_NomPlanograma;
    }

    public function setU_HBT_NomPlanograma($U_HBT_NomPlanograma)
    {
        $this->U_HBT_NomPlanograma = $U_HBT_NomPlanograma;
    }

    public function getU_HBT_UsuarioP1()
    {
        return $this->U_HBT_UsuarioP1;
    }

    public function setU_HBT_UsuarioP1($U_HBT_UsuarioP1)
    {
        $this->U_HBT_UsuarioP1 = $U_HBT_UsuarioP1;
    }

    public function getU_HBT_UsuarioP2()
    {
        return $this->U_HBT_UsuarioP2;
    }

    public function setU_HBT_UsuarioP2($U_HBT_UsuarioP2)
    {
        $this->U_HBT_UsuarioP2 = $U_HBT_UsuarioP2;
    }

    public function getU_HBT_UsuarioP3()
    {
        return $this->U_HBT_UsuarioP3;
    }

    public function setU_HBT_UsuarioP3($U_HBT_UsuarioP3)
    {
        $this->U_HBT_UsuarioP3 = $U_HBT_UsuarioP3;
    }

    public function getU_HBT_LAYOUT()
    {
        return $this->U_HBT_LAYOUT;
    }

    public function setU_HBT_LAYOUT($U_HBT_LAYOUT)
    {
        $this->U_HBT_LAYOUT = $U_HBT_LAYOUT;
    }

    public function getU_HBT_ROL()
    {
        return $this->U_HBT_ROL;
    }

    public function setU_HBT_ROL($U_HBT_ROL)
    {
        $this->U_HBT_ROL = $U_HBT_ROL;
    }

    public function getU_HBT_Especialidad()
    {
        return $this->U_HBT_Especialidad;
    }

    public function setU_HBT_Especialidad($U_HBT_Especialidad)
    {
        $this->U_HBT_Especialidad = $U_HBT_Especialidad;
    }

    public function getU_HBT_DtoAdicional()
    {
        return $this->U_HBT_DtoAdicional;
    }

    public function setU_HBT_DtoAdicional($U_HBT_DtoAdicional)
    {
        $this->U_HBT_DtoAdicional = $U_HBT_DtoAdicional;
    }

    public function getU_HBT_CODIGODET()
    {
        return $this->U_HBT_CODIGODET;
    }

    public function setU_HBT_CODIGODET($U_HBT_CODIGODET)
    {
        $this->U_HBT_CODIGODET = $U_HBT_CODIGODET;
    }

    public function getU_HBT_PREPARACION()
    {
        return $this->U_HBT_PREPARACION;
    }

    public function setU_HBT_PREPARACION($U_HBT_PREPARACION)
    {
        $this->U_HBT_PREPARACION = $U_HBT_PREPARACION;
    }

    public function getU_HBT_SERENVIOS()
    {
        return $this->U_HBT_SERENVIOS;
    }

    public function setU_HBT_SERENVIOS($U_HBT_SERENVIOS)
    {
        $this->U_HBT_SERENVIOS = $U_HBT_SERENVIOS;
    }

    public function getU_HBT_ACTTRANSNAC()
    {
        return $this->U_HBT_ACTTRANSNAC;
    }

    public function setU_HBT_ACTTRANSNAC($U_HBT_ACTTRANSNAC)
    {
        $this->U_HBT_ACTTRANSNAC = $U_HBT_ACTTRANSNAC;
    }

    public function getU_HBT_DESCCOMART()
    {
        return $this->U_HBT_DESCCOMART;
    }

    public function setU_HBT_DESCCOMART($U_HBT_DESCCOMART)
    {
        $this->U_HBT_DESCCOMART = $U_HBT_DESCCOMART;
    }

    public function getU_HBT_ACTMAGENTO()
    {
        return $this->U_HBT_ACTMAGENTO;
    }

    public function setU_HBT_ACTMAGENTO($U_HBT_ACTMAGENTO)
    {
        $this->U_HBT_ACTMAGENTO = $U_HBT_ACTMAGENTO;
    }

    public function getU_HBT_ACTMAGENTOB2B()
    {
        return $this->U_HBT_ACTMAGENTOB2B;
    }

    public function setU_HBT_ACTMAGENTOB2B($U_HBT_ACTMAGENTOB2B)
    {
        $this->U_HBT_ACTMAGENTOB2B = $U_HBT_ACTMAGENTOB2B;
    }

    public function getU_HBT_ACTMAGENTOB2C()
    {
        return $this->U_HBT_ACTMAGENTOB2C;
    }

    public function setU_HBT_ACTMAGENTOB2C($U_HBT_ACTMAGENTOB2C)
    {
        $this->U_HBT_ACTMAGENTOB2C = $U_HBT_ACTMAGENTOB2C;
    }

    public function getU_HBT_PROVCORONA()
    {
        return $this->U_HBT_PROVCORONA;
    }

    public function setU_HBT_PROVCORONA($U_HBT_PROVCORONA)
    {
        $this->U_HBT_PROVCORONA = $U_HBT_PROVCORONA;
    }

    public function getU_HBT_Alineaprov()
    {
        return $this->U_HBT_Alineaprov;
    }

    public function setU_HBT_Alineaprov($U_HBT_Alineaprov)
    {
        $this->U_HBT_Alineaprov = $U_HBT_Alineaprov;
    }

    public function getU_HBT_PlanoIntroDist()
    {
        return $this->U_HBT_PlanoIntroDist;
    }

    public function setU_HBT_PlanoIntroDist($U_HBT_PlanoIntroDist)
    {
        $this->U_HBT_PlanoIntroDist = $U_HBT_PlanoIntroDist;
    }

    public function getU_HBT_PlanoIntroSV()
    {
        return $this->U_HBT_PlanoIntroSV;
    }

    public function setU_HBT_PlanoIntroSV($U_HBT_PlanoIntroSV)
    {
        $this->U_HBT_PlanoIntroSV = $U_HBT_PlanoIntroSV;
    }

    public function getU_HBT_PlanoIntroConst()
    {
        return $this->U_HBT_PlanoIntroConst;
    }

    public function setU_HBT_PlanoIntroConst($U_HBT_PlanoIntroConst)
    {
        $this->U_HBT_PlanoIntroConst = $U_HBT_PlanoIntroConst;
    }

    public function getU_HBT_PlanoIntroInfra()
    {
        return $this->U_HBT_PlanoIntroInfra;
    }

    public function setU_HBT_PlanoIntroInfra($U_HBT_PlanoIntroInfra)
    {
        $this->U_HBT_PlanoIntroInfra = $U_HBT_PlanoIntroInfra;
    }

    public function getU_HBT_Marquilla()
    {
        return $this->U_HBT_Marquilla;
    }

    public function setU_HBT_Marquilla($U_HBT_Marquilla)
    {
        $this->U_HBT_Marquilla = $U_HBT_Marquilla;
    }

    public function getU_HBT_PlanoIntroDistFE()
    {
        return $this->U_HBT_PlanoIntroDistFE;
    }

    public function setU_HBT_PlanoIntroDistFE($U_HBT_PlanoIntroDistFE)
    {
        $this->U_HBT_PlanoIntroDistFE = $U_HBT_PlanoIntroDistFE;
    }

    public function getU_HBT_PORTAFOLIO()
    {
        return $this->U_HBT_PORTAFOLIO;
    }

    public function setU_HBT_PORTAFOLIO($U_HBT_PORTAFOLIO)
    {
        $this->U_HBT_PORTAFOLIO = $U_HBT_PORTAFOLIO;
    }

    public function getU_HBT_DTOADIPROV()
    {
        return $this->U_HBT_DTOADIPROV;
    }

    public function setU_HBT_DTOADIPROV($U_HBT_DTOADIPROV)
    {
        $this->U_HBT_DTOADIPROV = $U_HBT_DTOADIPROV;
    }

    public function getU_HBT_FECDTOADIPRO()
    {
        return $this->U_HBT_FECDTOADIPRO;
    }

    public function setU_HBT_FECDTOADIPRO($U_HBT_FECDTOADIPRO)
    {
        $this->U_HBT_FECDTOADIPRO = $U_HBT_FECDTOADIPRO;
    }

    public function getU_HBT_COSTOPRODUCTO()
    {
        return $this->U_HBT_COSTOPRODUCTO;
    }

    public function setU_HBT_COSTOPRODUCTO($U_HBT_COSTOPRODUCTO)
    {
        $this->U_HBT_COSTOPRODUCTO = $U_HBT_COSTOPRODUCTO;
    }

    private function getMaxDocEntry()
    {
        $stringSQL = "SELECT MAX(\"DocEntry\") + 1 AS \"DocEntry\" 
                      FROM \"SBOCASAANDINA\".\"OITM\"";
        $result = ConectorBD::ejecutarQuery($stringSQL);
        return isset($result[0]['DocEntry']) ? $result[0]['DocEntry'] : 1; // Devuelve 1 si no hay registros
    }

    public function getLeadTimeItem()
    {
        $stringSQL = "SELECT T0.\"LeadTime Art.\" AS \"leadTimeItem\" FROM \"_SYS_BIC\".\"CM_LEADTIMEART\" T0 WHERE T0.\"Articulo\" = '{$this->ItemCode}'";
        $result = ConectorBD::ejecutarQuery($stringSQL);
        return isset($result[0]['leadTimeItem']) ? round($result[0]['leadTimeItem'], 0) : 1; // Devuelve 1 si no hay registros
    }

    public function getInventory()
    {
        $html = '';
        $stringSQL = "SELECT T2.\"WhsCode\", T2.\"WhsName\", T1.\"OnHand\", T1.\"IsCommited\", T1.\"OnOrder\", T1.\"OnHand\" - T1.\"IsCommited\" + T1.\"OnOrder\" AS \"Available\", T1.\"AvgPrice\" FROM \"SBOCASAANDINA\".\"OITM\" T0 INNER JOIN \"SBOCASAANDINA\".\"OITW\" T1 ON T0.\"ItemCode\" = T1.\"ItemCode\" INNER JOIN \"SBOCASAANDINA\".\"OWHS\" T2 ON T1.\"WhsCode\" = T2.\"WhsCode\" WHERE T0.\"ItemCode\" = '{$this->ItemCode}' ORDER BY T2.\"WhsCode\"";
        $resultados = ConectorBD::ejecutarQuery($stringSQL);
        foreach ($resultados as $fila) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($fila['WhsCode']) . '</td>';
            $html .= '<td>' . htmlspecialchars($fila['WhsName']) . '</td>';
            $html .= '<td>' . htmlspecialchars($fila['OnHand']) . '</td>';
            $html .= '<td>' . htmlspecialchars($fila['IsCommited']) . '</td>';
            $html .= '<td>' . htmlspecialchars($fila['OnOrder']) . '</td>';
            $html .= '<td>' . htmlspecialchars($fila['Available']) . '</td>';
            $html .= '<td>' . number_format($fila['AvgPrice'], 2) . '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function guardar()
    {
        $this->validFor = $this->frozenFor === 'N' ? 'Y' : 'N';
        $this->CreateDate = date('Ymd');
        $this->CreateTS = date('Hms');
        $this->DocEntry = $this->getMaxDocEntry();
        $this->InvntryUom = $this->SalUnitMsr;
        $this->IWeight1 = $this->SWeight1;
        $this->U_HBT_DtoAdicional = !empty($this->U_HBT_DtoAdicional) ? "'{$this->U_HBT_DtoAdicional}'" : 'null';
        $this->OrdrIntrvl = !empty($this->OrdrIntrvl) ? "'{$this->OrdrIntrvl}'" : 'null';
        $this->ToleranDay = !empty($this->ToleranDay) ? "'{$this->ToleranDay}'" : 'null';
        $this->ItemName = !empty($this->ItemName) ? "'{$this->ItemName}'" : 'null';
        $this->FrgnName = !empty($this->FrgnName) ? "'{$this->FrgnName}'" : 'null';
        $this->CodeBars = !empty($this->CodeBars) ? "'{$this->CodeBars}'" : 'null';
        $this->UserText = !empty($this->UserText) ? "'{$this->UserText}'" : 'null';
        $this->SWW = !empty($this->SWW) ? "'{$this->SWW}'" : 'null';
        $this->U_HBT_TABDTOADI = !empty($this->U_HBT_TABDTOADI) ? "'{$this->U_HBT_TABDTOADI}'" : 'null';
        $this->U_HBT_FecIniDto = !empty($this->U_HBT_FecIniDto) ? "'{$this->U_HBT_FecIniDto}'" : 'null';
        $this->U_HBT_FecFinDto = !empty($this->U_HBT_FecFinDto) ? "'{$this->U_HBT_FecFinDto}'" : 'null';
        $this->U_HBT_MENSAJEMP = !empty($this->U_HBT_MENSAJEMP) ? "'{$this->U_HBT_MENSAJEMP}'" : 'null';
        $this->U_HBT_NomPlanograma = !empty($this->U_HBT_NomPlanograma) ? "'{$this->U_HBT_NomPlanograma}'" : 'null';
        $this->U_HBT_UsuarioP1 = !empty($this->U_HBT_UsuarioP1) ? "'{$this->U_HBT_UsuarioP1}'" : 'null';
        $this->U_HBT_UsuarioP2 = !empty($this->U_HBT_UsuarioP2) ? "'{$this->U_HBT_UsuarioP2}'" : 'null';
        $this->U_HBT_UsuarioP3 = !empty($this->U_HBT_UsuarioP3) ? "'{$this->U_HBT_UsuarioP3}'" : 'null';
        $this->U_HBT_LAYOUT = !empty($this->U_HBT_LAYOUT) ? "'{$this->U_HBT_LAYOUT}'" : 'null';
        $this->U_HBT_DESCCOMART = !empty($this->U_HBT_DESCCOMART) ? "'{$this->U_HBT_DESCCOMART}'" : 'null';
        $this->U_HBT_Alineaprov = !empty($this->U_HBT_Alineaprov) ? "'{$this->U_HBT_Alineaprov}'" : 'null';
        $this->U_HBT_Marquilla = !empty($this->U_HBT_Marquilla) ? "'{$this->U_HBT_Marquilla}'" : 'null';
        $this->U_HBT_FECDTOADIPRO = !empty($this->U_HBT_FECDTOADIPRO) ? "'{$this->U_HBT_FECDTOADIPRO}'" : 'null';
        $this->U_HBT_COSTOPRODUCTO = !empty($this->U_HBT_COSTOPRODUCTO) ? "'{$this->U_HBT_COSTOPRODUCTO}'" : 'null';

        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"OITM\" 
                          (\"ItemCode\", \"ItemName\", \"FrgnName\", \"ItmsGrpCod\", \"CstGrpCode\", \"VatGourpSa\", \"CodeBars\", \"VATLiable\", \"PrchseItem\", \"SellItem\", \"InvntItem\", \"OnHand\", \"IsCommited\", \"OnOrder\", \"IncomeAcct\", \"ExmptIncom\", \"MaxLevel\", \"DfltWH\", \"CardCode\", \"SuppCatNum\", \"BuyUnitMsr\", \"NumInBuy\", \"ReorderQty\", \"MinLevel\", \"LstEvlPric\", \"LstEvlDate\", \"CustomPer\", \"Canceled\", \"MnufctTime\", \"WholSlsTax\", \"RetilrTax\", \"SpcialDisc\", \"DscountCod\", \"TrackSales\", \"SalUnitMsr\", \"NumInSale\", \"Consig\", \"QueryGroup\", \"Counted\", \"OpenBlnc\", \"EvalSystem\", \"UserSign\", \"FREE\", \"PicturName\", \"Transfered\", \"BlncTrnsfr\", \"UserText\", \"SerialNum\", \"CommisPcnt\", \"CommisSum\", \"CommisGrp\", \"TreeType\", \"TreeQty\", \"LastPurPrc\", \"LastPurCur\", \"LastPurDat\", \"ExitCur\", \"ExitPrice\", \"ExitWH\", \"AssetItem\", \"WasCounted\", \"ManSerNum\", \"SHeight1\", \"SHght1Unit\", \"SHeight2\", \"SHght2Unit\", \"SWidth1\", \"SWdth1Unit\", \"SWidth2\", \"SWdth2Unit\", \"SLength1\", \"SLen1Unit\", \"Slength2\", \"SLen2Unit\", \"SVolume\", \"SVolUnit\", \"SWeight1\", \"SWght1Unit\", \"SWeight2\", \"SWght2Unit\", \"BHeight1\", \"BHght1Unit\", \"BHeight2\", \"BHght2Unit\", \"BWidth1\", \"BWdth1Unit\", \"BWidth2\", \"BWdth2Unit\", \"BLength1\", \"BLen1Unit\", \"Blength2\", \"BLen2Unit\", \"BVolume\", \"BVolUnit\", \"BWeight1\", \"BWght1Unit\", \"BWeight2\", \"BWght2Unit\", \"FixCurrCms\", \"FirmCode\", \"LstSalDate\", \"QryGroup1\", \"QryGroup2\", \"QryGroup3\", \"QryGroup4\", \"QryGroup5\", \"QryGroup6\", \"QryGroup7\", \"QryGroup8\", \"QryGroup9\", \"QryGroup10\", \"QryGroup11\", \"QryGroup12\", \"QryGroup13\", \"QryGroup14\", \"QryGroup15\", \"QryGroup16\", \"QryGroup17\", \"QryGroup18\", \"QryGroup19\", \"QryGroup20\", \"QryGroup21\", \"QryGroup22\", \"QryGroup23\", \"QryGroup24\", \"QryGroup25\", \"QryGroup26\", \"QryGroup27\", \"QryGroup28\", \"QryGroup29\", \"QryGroup30\", \"QryGroup31\", \"QryGroup32\", \"QryGroup33\", \"QryGroup34\", \"QryGroup35\", \"QryGroup36\", \"QryGroup37\", \"QryGroup38\", \"QryGroup39\", \"QryGroup40\", \"QryGroup41\", \"QryGroup42\", \"QryGroup43\", \"QryGroup44\", \"QryGroup45\", \"QryGroup46\", \"QryGroup47\", \"QryGroup48\", \"QryGroup49\", \"QryGroup50\", \"QryGroup51\", \"QryGroup52\", \"QryGroup53\", \"QryGroup54\", \"QryGroup55\", \"QryGroup56\", \"QryGroup57\", \"QryGroup58\", \"QryGroup59\", \"QryGroup60\", \"QryGroup61\", \"QryGroup62\", \"QryGroup63\", \"QryGroup64\", \"CreateDate\", \"UpdateDate\", \"ExportCode\", \"SalFactor1\", \"SalFactor2\", \"SalFactor3\", \"SalFactor4\", \"PurFactor1\", \"PurFactor2\", \"PurFactor3\", \"PurFactor4\", \"SalFormula\", \"PurFormula\", \"VatGroupPu\", \"AvgPrice\", \"PurPackMsr\", \"PurPackUn\", \"SalPackMsr\", \"SalPackUn\", \"SCNCounter\", \"ManBtchNum\", \"ManOutOnly\", \"DataSource\", \"validFor\", \"validFrom\", \"validTo\", \"frozenFor\", \"frozenFrom\", \"frozenTo\", \"BlockOut\", \"ValidComm\", \"FrozenComm\", \"LogInstanc\", \"ObjType\", \"SWW\", \"Deleted\", \"DocEntry\", \"ExpensAcct\", \"FrgnInAcct\", \"ShipType\", \"GLMethod\", \"ECInAcct\", \"FrgnExpAcc\", \"ECExpAcc\", \"TaxType\", \"ByWh\", \"WTLiable\", \"ItemType\", \"WarrntTmpl\", \"BaseUnit\", \"CountryOrg\", \"StockValue\", \"Phantom\", \"IssueMthd\", \"FREE1\", \"PricingPrc\", \"MngMethod\", \"ReorderPnt\", \"InvntryUom\", \"PlaningSys\", \"PrcrmntMtd\", \"OrdrIntrvl\", \"OrdrMulti\", \"MinOrdrQty\", \"LeadTime\", \"IndirctTax\", \"TaxCodeAR\", \"TaxCodeAP\", \"OSvcCode\", \"ISvcCode\", \"ServiceGrp\", \"NCMCode\", \"MatType\", \"MatGrp\", \"ProductSrc\", \"ServiceCtg\", \"ItemClass\", \"Excisable\", \"ChapterID\", \"NotifyASN\", \"ProAssNum\", \"AssblValue\", \"DNFEntry\", \"UserSign2\", \"Spec\", \"TaxCtg\", \"Series\", \"Number\", \"FuelCode\", \"BeverTblC\", \"BeverGrpC\", \"BeverTM\", \"Attachment\", \"AtcEntry\", \"ToleranDay\", \"UgpEntry\", \"PUoMEntry\", \"SUoMEntry\", \"IUoMEntry\", \"IssuePriBy\", \"AssetClass\", \"AssetGroup\", \"InventryNo\", \"Technician\", \"Employee\", \"Location\", \"StatAsset\", \"Cession\", \"DeacAftUL\", \"AsstStatus\", \"CapDate\", \"AcqDate\", \"RetDate\", \"GLPickMeth\", \"NoDiscount\", \"MgrByQty\", \"AssetRmk1\", \"AssetRmk2\", \"AssetAmnt1\", \"AssetAmnt2\", \"DeprGroup\", \"AssetSerNo\", \"CntUnitMsr\", \"NumInCnt\", \"INUoMEntry\", \"OneBOneRec\", \"RuleCode\", \"ScsCode\", \"SpProdType\", \"IWeight1\", \"IWght1Unit\", \"IWeight2\", \"IWght2Unit\", \"CompoWH\", \"CreateTS\", \"VirtAstItm\", \"SouVirAsst\", \"InCostRoll\", \"PrdStdCst\", \"EnAstSeri\", \"LinkRsc\", \"OnHldPert\", \"onHldLimt\", \"PriceUnit\", \"GSTRelevnt\", \"SACEntry\", \"GstTaxCtg\", \"AssVal4WTR\", \"ExcImpQUoM\", \"ExcFixAmnt\", \"ExcRate\", \"SOIExc\", \"TNVED\", \"Imported\", \"AutoBatch\", \"CstmActing\", \"StdItemId\", \"CommClass\", \"TaxCatCode\", \"DataVers\", \"NVECode\", \"CESTCode\", \"CtrSealQty\", \"LegalText\", \"QRCodeSrc\", \"Traceable\", \"U_HBT_TerceroFacPro\", \"U_HBT_TerceroAmorti\", \"U_HBT_TerceroBaja\", \"U_IFRS_TERM\", \"U_IFRS_VENT\", \"U_IFRS_MARK\", \"U_IFRS_GTIA\", \"U_IFRS_Tiempo\", \"U_IFRS_ActPadre\", \"U_HBT_FecPoliza\", \"U_HBT_FecVtoGarn\", \"U_HBT_FecMantto\", \"U_IFRS_Tipo\", \"U_IFRS_EXCDET\", \"U_IFRS_TipoAF\", \"U_HBT_CANTM2\", \"U_HBT_PRECIOXM2\", \"U_HBT_FECHA_AR\", \"U_HBT_FAMILIA\", \"U_HBT_CATEGORIA\", \"U_HBT_LINEA\", \"U_HBT_TIPOLISTA\", \"U_HBT_CODIGOTAB\", \"U_U_HBT_TABDTOGRU\", \"U_HBT_PREBASE\", \"U_HBT_DTOPROV\", \"U_HBT_COSBASE\", \"U_HBT_PORGASTOS\", \"U_HBT_COSESTIMADO\", \"U_HBT_MARGENMIN\", \"U_HBT_PORINCRE\", \"U_HBT_MUTIL\", \"U_HBT_DTOMAX\", \"U_HBT_pvmc\", \"U_HBT_PVMP\", \"U_HBT_MUPVMP\", \"U_HBT_MUpvmc\", \"U_U_HBT_COSPROM\", \"U_HBT_FLETES\", \"U_HBT_FVOLUMEN\", \"U_HBT_DTOFAB\", \"U_HBT_CONCEPTO\", \"U_HBT_VRGASTOS\", \"U_PLU\", \"U_HBT_CodigoProducto\", \"U_HBT_TABDTOADI\", \"U_HBT_CodProductoFE\", \"U_HBT_POSICION\", \"U_HBT_CLASIFICACION\", \"U_HBT_CodVendedor\", \"U_HBT_AplicaAIU\", \"U_HBT_SUBGRUPO\", \"U_HBT_FSMIN\", \"U_HBT_FSMAX\", \"U_HBT_Modelo\", \"U_HBT_Marca\", \"U_HBT_BolsaPlas\", \"U_HBT_COMPENSACION\", \"U_HBT_VRCOMPENSACION\", \"U_HBT_USOCOSPROM\", \"U_HBT_FecIniDto\", \"U_HBT_FecFinDto\", \"U_HBT_NDTOMAX\", \"U_HBT_MENSAJEMP\", \"U_HBT_NomPlanograma\", \"U_HBT_PlanoDominante\", \"U_HBT_PlanoCompet\", \"U_HBT_UsuarioP1\", \"U_HBT_UsuarioP2\", \"U_HBT_UsuarioP3\", \"U_HBT_LAYOUT\", \"U_HBT_ROL\", \"U_HBT_Especialidad\", \"U_HBT_DtoAdicional\", \"U_HBT_CODIGODET\", \"U_HBT_PREPARACION\", \"U_HBT_SERENVIOS\", \"U_HBT_ACTTRANSNAC\", \"U_HBT_DESCCOMART\", \"U_HBT_ACTMAGENTO\", \"U_HBT_ACTMAGENTOB2B\", \"U_HBT_ACTMAGENTOB2C\", \"U_HBT_FirmCode\", \"U_HBT_PROVCORONA\", \"U_HBT_Alineaprov\", \"U_HBT_PlanoIntroDist\", \"U_HBT_PlanoIntroSV\", \"U_HBT_PlanoIntroConst\", \"U_HBT_PlanoIntroInfra\", \"U_HBT_Marquilla\", \"U_HBT_PlanoIntroSVFE\", \"U_HBT_PlanoIntroDistFE\", \"U_HBT_PORTAFOLIO\", \"U_HBT_DTOADIPROV\", \"U_HBT_FECDTOADIPRO\", \"U_HBT_COSTOPRODUCTO\", \"U_HBT_APLICADTOADIPRO\", \"U_HBT_COMPRADOR\", \"U_HBT_ValIBUA\", \"U_HBT_CantML\", \"U_HBT_ValINPP\", \"U_HBT_CantINPP\", \"U_HBT_ValICL\", \"U_HBT_CantICL\", \"U_HBT_BaseADV\") 
                          VALUES 
                          ('{$this->ItemCode}', {$this->ItemName}, {$this->FrgnName}, '{$this->ItmsGrpCod}', {$this->CstGrpCode}, $this->VatGourpSa, {$this->CodeBars}, '{$this->VATLiable}', '{$this->PrchseItem}', '{$this->SellItem}', '{$this->InvntItem}', '{$this->OnHand}', '{$this->IsCommited}', '{$this->OnOrder}', $this->IncomeAcct, $this->ExmptIncom, '{$this->MaxLevel}', $this->DfltWH, '{$this->CardCode}', '{$this->SuppCatNum}', '{$this->BuyUnitMsr}', '{$this->NumInBuy}', '{$this->ReorderQty}', '{$this->MinLevel}', '{$this->LstEvlPric}', $this->LstEvlDate, '{$this->CustomPer}', '{$this->Canceled}', $this->MnufctTime, $this->WholSlsTax, $this->RetilrTax, '{$this->SpcialDisc}', $this->DscountCod, '{$this->TrackSales}', '{$this->SalUnitMsr}', '{$this->NumInSale}', '{$this->Consig}', '{$this->QueryGroup}', '{$this->Counted}', '{$this->OpenBlnc}', '{$this->EvalSystem}', '{$this->UserSign}', '{$this->FREE}', '{$this->PicturName}', '{$this->Transfered}', '{$this->BlncTrnsfr}', {$this->UserText}, $this->SerialNum, '{$this->CommisPcnt}', '{$this->CommisSum}', '{$this->CommisGrp}', '{$this->TreeType}', '{$this->TreeQty}', '{$this->LastPurPrc}', $this->LastPurCur, $this->LastPurDat, $this->ExitCur, '{$this->ExitPrice}', $this->ExitWH, '{$this->AssetItem}', '{$this->WasCounted}', '{$this->ManSerNum}', '{$this->SHeight1}', {$this->SHght1Unit}, '{$this->SHeight2}', $this->SHght2Unit, '{$this->SWidth1}', '{$this->SWdth1Unit}', '{$this->SWidth2}', $this->SWdth2Unit, '{$this->SLength1}', '{$this->SLen1Unit}', '{$this->Slength2}', $this->SLen2Unit, '{$this->SVolume}', '{$this->SVolUnit}', '{$this->SWeight1}', '{$this->SWght1Unit}', '{$this->SWeight2}', $this->SWght2Unit, '{$this->BHeight1}', '{$this->BHght1Unit}', '{$this->BHeight2}', $this->BHght2Unit, '{$this->BWidth1}', '{$this->BWdth1Unit}', '{$this->BWidth2}', $this->BWdth2Unit, '{$this->BLength1}', '{$this->BLen1Unit}', '{$this->Blength2}', $this->BLen2Unit, '{$this->BVolume}', '{$this->BVolUnit}', '{$this->BWeight1}', '{$this->BWght1Unit}', '{$this->BWeight2}', $this->BWght2Unit, $this->FixCurrCms, '{$this->FirmCode}', $this->LstSalDate, '{$this->QryGroup1}', '{$this->QryGroup2}', '{$this->QryGroup3}', '{$this->QryGroup4}', '{$this->QryGroup5}', '{$this->QryGroup6}', '{$this->QryGroup7}', '{$this->QryGroup8}', '{$this->QryGroup9}', '{$this->QryGroup10}', '{$this->QryGroup11}', '{$this->QryGroup12}', '{$this->QryGroup13}', '{$this->QryGroup14}', '{$this->QryGroup15}', '{$this->QryGroup16}', '{$this->QryGroup17}', '{$this->QryGroup18}', '{$this->QryGroup19}', '{$this->QryGroup20}', '{$this->QryGroup21}', '{$this->QryGroup22}', '{$this->QryGroup23}', '{$this->QryGroup24}', '{$this->QryGroup25}', '{$this->QryGroup26}', '{$this->QryGroup27}', '{$this->QryGroup28}', '{$this->QryGroup29}', '{$this->QryGroup30}', '{$this->QryGroup31}', '{$this->QryGroup32}', '{$this->QryGroup33}', '{$this->QryGroup34}', '{$this->QryGroup35}', '{$this->QryGroup36}', '{$this->QryGroup37}', '{$this->QryGroup38}', '{$this->QryGroup39}', '{$this->QryGroup40}', '{$this->QryGroup41}', '{$this->QryGroup42}', '{$this->QryGroup43}', '{$this->QryGroup44}', '{$this->QryGroup45}', '{$this->QryGroup46}', '{$this->QryGroup47}', '{$this->QryGroup48}', '{$this->QryGroup49}', '{$this->QryGroup50}', '{$this->QryGroup51}', '{$this->QryGroup52}', '{$this->QryGroup53}', '{$this->QryGroup54}', '{$this->QryGroup55}', '{$this->QryGroup56}', '{$this->QryGroup57}', '{$this->QryGroup58}', '{$this->QryGroup59}', '{$this->QryGroup60}', '{$this->QryGroup61}', '{$this->QryGroup62}', '{$this->QryGroup63}', '{$this->QryGroup64}', '{$this->CreateDate}', '{$this->UpdateDate}', $this->ExportCode, '{$this->SalFactor1}', '{$this->SalFactor2}', '{$this->SalFactor3}', '{$this->SalFactor4}', '{$this->PurFactor1}', '{$this->PurFactor2}', '{$this->PurFactor3}', '{$this->PurFactor4}', $this->SalFormula, $this->PurFormula, $this->VatGroupPu, '{$this->AvgPrice}', '{$this->PurPackMsr}', '{$this->PurPackUn}', '{$this->SalPackMsr}', '{$this->SalPackUn}', $this->SCNCounter, '{$this->ManBtchNum}', '{$this->ManOutOnly}', '{$this->DataSource}', '{$this->validFor}', $this->validFrom, $this->validTo, '{$this->frozenFor}', $this->frozenFrom, $this->frozenTo, '{$this->BlockOut}', $this->ValidComm, $this->FrozenComm, '{$this->LogInstanc}', '{$this->ObjType}', {$this->SWW}, '{$this->Deleted}', '{$this->DocEntry}', $this->ExpensAcct, $this->FrgnInAcct, '{$this->ShipType}', '{$this->GLMethod}', $this->ECInAcct, $this->FrgnExpAcc, $this->ECExpAcc, '{$this->TaxType}', '{$this->ByWh}', '{$this->WTLiable}', '{$this->ItemType}', $this->WarrntTmpl, $this->BaseUnit, $this->CountryOrg, '{$this->StockValue}', '{$this->Phantom}', '{$this->IssueMthd}', $this->FREE1, '{$this->PricingPrc}', '{$this->MngMethod}', '{$this->ReorderPnt}', '{$this->InvntryUom}', '{$this->PlaningSys}', '{$this->PrcrmntMtd}', {$this->OrdrIntrvl}, '{$this->OrdrMulti}', '{$this->MinOrdrQty}', '{$this->LeadTime}', '{$this->IndirctTax}', '{$this->TaxCodeAR}', '{$this->TaxCodeAP}', '{$this->OSvcCode}', '{$this->ISvcCode}', '{$this->ServiceGrp}', '{$this->NCMCode}', '{$this->MatType}', '{$this->MatGrp}', '{$this->ProductSrc}', '{$this->ServiceCtg}', '{$this->ItemClass}', '{$this->Excisable}', '{$this->ChapterID}', $this->NotifyASN, $this->ProAssNum, '{$this->AssblValue}', '{$this->DNFEntry}', '{$this->UserSign2}', $this->Spec, $this->TaxCtg, '{$this->Series}', {$this->Number}, '{$this->FuelCode}', $this->BeverTblC, $this->BeverGrpC, '{$this->BeverTM}', $this->Attachment, $this->AtcEntry, {$this->ToleranDay}, '{$this->UgpEntry}', $this->PUoMEntry, $this->SUoMEntry, '{$this->IUoMEntry}', '{$this->IssuePriBy}', $this->AssetClass, $this->AssetGroup, $this->InventryNo, $this->Technician, $this->Employee, $this->Location, '{$this->StatAsset}', '{$this->Cession}', '{$this->DeacAftUL}', '{$this->AsstStatus}', $this->CapDate, $this->AcqDate, $this->RetDate, '{$this->GLPickMeth}', '{$this->NoDiscount}', '{$this->MgrByQty}', $this->AssetRmk1, $this->AssetRmk2, '{$this->AssetAmnt1}', '{$this->AssetAmnt2}', $this->DeprGroup, $this->AssetSerNo, $this->CntUnitMsr, '{$this->NumInCnt}', $this->INUoMEntry, '{$this->OneBOneRec}', $this->RuleCode, $this->ScsCode, $this->SpProdType, '{$this->IWeight1}', '{$this->IWght1Unit}', '{$this->IWeight2}', $this->IWght2Unit, '{$this->CompoWH}', '{$this->CreateTS}', '{$this->VirtAstItm}', $this->SouVirAsst, '{$this->InCostRoll}', $this->PrdStdCst, '{$this->EnAstSeri}', $this->LinkRsc, $this->OnHldPert, $this->onHldLimt, '{$this->PriceUnit}', '{$this->GSTRelevnt}', '{$this->SACEntry}', '{$this->GstTaxCtg}', '{$this->AssVal4WTR}', $this->ExcImpQUoM, $this->ExcFixAmnt, $this->ExcRate, '{$this->SOIExc}', $this->TNVED, '{$this->Imported}', '{$this->AutoBatch}', '{$this->CstmActing}', $this->StdItemId, $this->CommClass, $this->TaxCatCode, '{$this->DataVers}', $this->NVECode, '{$this->CESTCode}', $this->CtrSealQty, $this->LegalText, $this->QRCodeSrc, '{$this->Traceable}', $this->U_HBT_TerceroFacPro, $this->U_HBT_TerceroAmorti, $this->U_HBT_TerceroBaja, $this->U_IFRS_TERM, $this->U_IFRS_VENT, $this->U_IFRS_MARK, $this->U_IFRS_GTIA, $this->U_IFRS_Tiempo, $this->U_IFRS_ActPadre, $this->U_HBT_FecPoliza, $this->U_HBT_FecVtoGarn, $this->U_HBT_FecMantto, $this->U_IFRS_Tipo, $this->U_IFRS_EXCDET, $this->U_IFRS_TipoAF, $this->U_HBT_CANTM2, '{$this->U_HBT_PRECIOXM2}', $this->U_HBT_FECHA_AR, '{$this->U_HBT_FAMILIA}', '{$this->U_HBT_CATEGORIA}', '{$this->U_HBT_LINEA}', '{$this->U_HBT_TIPOLISTA}', '{$this->U_HBT_CODIGOTAB}', '{$this->U_U_HBT_TABDTOGRU}', '{$this->U_HBT_PREBASE}', '{$this->U_HBT_DTOPROV}', '{$this->U_HBT_COSBASE}', '{$this->U_HBT_PORGASTOS}', '{$this->U_HBT_COSESTIMADO}', '{$this->U_HBT_MARGENMIN}', '{$this->U_HBT_PORINCRE}', '{$this->U_HBT_MUTIL}', '{$this->U_HBT_DTOMAX}', '{$this->U_HBT_pvmc}', '{$this->U_HBT_PVMP}', '{$this->U_HBT_MUPVMP}', '{$this->U_HBT_MUpvmc}', '{$this->U_U_HBT_COSPROM}', '{$this->U_HBT_FLETES}', '{$this->U_HBT_FVOLUMEN}', '{$this->U_HBT_DTOFAB}', '{$this->U_HBT_CONCEPTO}', '{$this->U_HBT_VRGASTOS}', $this->U_PLU, $this->U_HBT_CodigoProducto, {$this->U_HBT_TABDTOADI}, $this->U_HBT_CodProductoFE, $this->U_HBT_POSICION, $this->U_HBT_CLASIFICACION, $this->U_HBT_CodVendedor, '{$this->U_HBT_AplicaAIU}', $this->U_HBT_SUBGRUPO, '{$this->U_HBT_FSMIN}', '{$this->U_HBT_FSMAX}', $this->U_HBT_Modelo, $this->U_HBT_Marca, '{$this->U_HBT_BolsaPlas}', $this->U_HBT_COMPENSACION, '{$this->U_HBT_VRCOMPENSACION}', '{$this->U_HBT_USOCOSPROM}', {$this->U_HBT_FecIniDto}, {$this->U_HBT_FecFinDto}, '{$this->U_HBT_NDTOMAX}', {$this->U_HBT_MENSAJEMP}, {$this->U_HBT_NomPlanograma}, '{$this->U_HBT_PlanoDominante}', '{$this->U_HBT_PlanoCompet}', {$this->U_HBT_UsuarioP1}, {$this->U_HBT_UsuarioP2}, {$this->U_HBT_UsuarioP3}, {$this->U_HBT_LAYOUT}, '{$this->U_HBT_ROL}', '{$this->U_HBT_Especialidad}', {$this->U_HBT_DtoAdicional}, '{$this->U_HBT_CODIGODET}', '{$this->U_HBT_PREPARACION}', '{$this->U_HBT_SERENVIOS}', '{$this->U_HBT_ACTTRANSNAC}', {$this->U_HBT_DESCCOMART}, '{$this->U_HBT_ACTMAGENTO}', '{$this->U_HBT_ACTMAGENTOB2B}', '{$this->U_HBT_ACTMAGENTOB2C}', $this->U_HBT_FirmCode, '{$this->U_HBT_PROVCORONA}', {$this->U_HBT_Alineaprov}, '{$this->U_HBT_PlanoIntroDist}', '{$this->U_HBT_PlanoIntroSV}', '{$this->U_HBT_PlanoIntroConst}', '{$this->U_HBT_PlanoIntroInfra}', {$this->U_HBT_Marquilla}, '{$this->U_HBT_PlanoIntroSVFE}', '{$this->U_HBT_PlanoIntroDistFE}', '{$this->U_HBT_PORTAFOLIO}', '{$this->U_HBT_DTOADIPROV}', {$this->U_HBT_FECDTOADIPRO}, {$this->U_HBT_COSTOPRODUCTO}, '{$this->U_HBT_APLICADTOADIPRO}', $this->U_HBT_COMPRADOR, $this->U_HBT_ValIBUA, $this->U_HBT_CantML, $this->U_HBT_ValINPP, $this->U_HBT_CantINPP, $this->U_HBT_ValICL, $this->U_HBT_CantICL, $this->U_HBT_BaseADV)";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public function modificar()
    {
        $this->validFor = $this->frozenFor === 'N' ? 'Y' : 'N';
        $this->UpdateDate = date('Ymd');
        $this->UpdateTS = date('Hms');
        $this->PicturName = !empty($this->PicturName) ? ", \"PicturName\" = '{$this->PicturName}'" : '';
        $this->InvntryUom = $this->SalUnitMsr;
        $this->IWeight1 = $this->SWeight1;
        $this->U_HBT_DtoAdicional = !empty($this->U_HBT_DtoAdicional) ? "'{$this->U_HBT_DtoAdicional}'" : 'null';
        $this->OrdrIntrvl = !empty($this->OrdrIntrvl) ? "'{$this->OrdrIntrvl}'" : 'null';
        $this->ToleranDay = !empty($this->ToleranDay) ? "'{$this->ToleranDay}'" : 'null';
        $this->ItemName = !empty($this->ItemName) ? "'{$this->ItemName}'" : 'null';
        $this->FrgnName = !empty($this->FrgnName) ? "'{$this->FrgnName}'" : 'null';
        $this->CodeBars = !empty($this->CodeBars) ? "'{$this->CodeBars}'" : 'null';
        $this->UserText = !empty($this->UserText) ? "'{$this->UserText}'" : 'null';
        $this->SWW = !empty($this->SWW) ? "'{$this->SWW}'" : 'null';
        $this->U_HBT_TABDTOADI = !empty($this->U_HBT_TABDTOADI) ? "'{$this->U_HBT_TABDTOADI}'" : 'null';
        $this->U_HBT_FecIniDto = !empty($this->U_HBT_FecIniDto) ? "'{$this->U_HBT_FecIniDto}'" : 'null';
        $this->U_HBT_FecFinDto = !empty($this->U_HBT_FecFinDto) ? "'{$this->U_HBT_FecFinDto}'" : 'null';
        $this->U_HBT_MENSAJEMP = !empty($this->U_HBT_MENSAJEMP) ? "'{$this->U_HBT_MENSAJEMP}'" : 'null';
        $this->U_HBT_NomPlanograma = !empty($this->U_HBT_NomPlanograma) ? "'{$this->U_HBT_NomPlanograma}'" : 'null';
        $this->U_HBT_UsuarioP1 = !empty($this->U_HBT_UsuarioP1) ? "'{$this->U_HBT_UsuarioP1}'" : 'null';
        $this->U_HBT_UsuarioP2 = !empty($this->U_HBT_UsuarioP2) ? "'{$this->U_HBT_UsuarioP2}'" : 'null';
        $this->U_HBT_UsuarioP3 = !empty($this->U_HBT_UsuarioP3) ? "'{$this->U_HBT_UsuarioP3}'" : 'null';
        $this->U_HBT_LAYOUT = !empty($this->U_HBT_LAYOUT) ? "'{$this->U_HBT_LAYOUT}'" : 'null';
        $this->U_HBT_DESCCOMART = !empty($this->U_HBT_DESCCOMART) ? "'{$this->U_HBT_DESCCOMART}'" : 'null';
        $this->U_HBT_Alineaprov = !empty($this->U_HBT_Alineaprov) ? "'{$this->U_HBT_Alineaprov}'" : 'null';
        $this->U_HBT_Marquilla = !empty($this->U_HBT_Marquilla) ? "'{$this->U_HBT_Marquilla}'" : 'null';
        $this->U_HBT_FECDTOADIPRO = !empty($this->U_HBT_FECDTOADIPRO) ? "'{$this->U_HBT_FECDTOADIPRO}'" : 'null';
        $this->U_HBT_COSTOPRODUCTO = !empty($this->U_HBT_COSTOPRODUCTO) ? "'{$this->U_HBT_COSTOPRODUCTO}'" : 'null';

        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"OITM\" 
                          SET \"ItemCode\" = '{$this->ItemCode}', \"ItemName\" = {$this->ItemName}, \"FrgnName\" = {$this->FrgnName}, \"ItmsGrpCod\" = '{$this->ItmsGrpCod}', \"CodeBars\" = {$this->CodeBars}, \"PrchseItem\" = '{$this->PrchseItem}', \"SellItem\" = '{$this->SellItem}', \"InvntItem\" = '{$this->InvntItem}', \"CardCode\" = '{$this->CardCode}', \"SuppCatNum\" = '{$this->SuppCatNum}', \"BuyUnitMsr\" = '{$this->BuyUnitMsr}', \"NumInBuy\" = '{$this->NumInBuy}', \"SalUnitMsr\" = '{$this->SalUnitMsr}', \"NumInSale\" = '{$this->NumInSale}', \"UserSign\" = '{$this->UserSign}'{$this->PicturName}, \"UserText\" = {$this->UserText}, \"SHeight1\" = '{$this->SHeight1}', \"SWidth1\" = '{$this->SWidth1}', \"SLength1\" = '{$this->SLength1}', \"SVolume\" = '{$this->SVolume}', \"SVolUnit\" = '{$this->SVolUnit}', \"SWeight1\" = '{$this->SWeight1}', \"BHeight1\" = '{$this->BHeight1}', \"BWidth1\" = '{$this->BWidth1}', \"BLength1\" = '{$this->BLength1}', \"BVolume\" = '{$this->BVolume}', \"BVolUnit\" = '{$this->BVolUnit}', \"BWeight1\" = '{$this->BWeight1}', \"FirmCode\" = '{$this->FirmCode}', \"QryGroup1\" = '{$this->QryGroup1}', \"QryGroup2\" = '{$this->QryGroup2}', \"QryGroup3\" = '{$this->QryGroup3}', \"QryGroup4\" = '{$this->QryGroup4}', \"QryGroup5\" = '{$this->QryGroup5}', \"QryGroup6\" = '{$this->QryGroup6}', \"QryGroup7\" = '{$this->QryGroup7}', \"QryGroup8\" = '{$this->QryGroup8}', \"QryGroup9\" = '{$this->QryGroup9}', \"QryGroup10\" = '{$this->QryGroup10}', \"QryGroup11\" = '{$this->QryGroup11}', \"QryGroup12\" = '{$this->QryGroup12}', \"QryGroup13\" = '{$this->QryGroup13}', \"QryGroup14\" = '{$this->QryGroup14}', \"QryGroup15\" = '{$this->QryGroup15}', \"QryGroup16\" = '{$this->QryGroup16}', \"QryGroup17\" = '{$this->QryGroup17}', \"QryGroup18\" = '{$this->QryGroup18}', \"QryGroup19\" = '{$this->QryGroup19}', \"QryGroup20\" = '{$this->QryGroup20}', \"QryGroup21\" = '{$this->QryGroup21}', \"QryGroup22\" = '{$this->QryGroup22}', \"QryGroup23\" = '{$this->QryGroup23}', \"QryGroup24\" = '{$this->QryGroup24}', \"QryGroup25\" = '{$this->QryGroup25}', \"QryGroup26\" = '{$this->QryGroup26}', \"QryGroup27\" = '{$this->QryGroup27}', \"QryGroup28\" = '{$this->QryGroup28}', \"QryGroup29\" = '{$this->QryGroup29}', \"QryGroup30\" = '{$this->QryGroup30}', \"QryGroup31\" = '{$this->QryGroup31}', \"QryGroup32\" = '{$this->QryGroup32}', \"QryGroup33\" = '{$this->QryGroup33}', \"QryGroup34\" = '{$this->QryGroup34}', \"QryGroup35\" = '{$this->QryGroup35}', \"QryGroup36\" = '{$this->QryGroup36}', \"QryGroup37\" = '{$this->QryGroup37}', \"QryGroup38\" = '{$this->QryGroup38}', \"QryGroup39\" = '{$this->QryGroup39}', \"QryGroup40\" = '{$this->QryGroup40}', \"QryGroup41\" = '{$this->QryGroup41}', \"QryGroup42\" = '{$this->QryGroup42}', \"QryGroup43\" = '{$this->QryGroup43}', \"QryGroup44\" = '{$this->QryGroup44}', \"QryGroup45\" = '{$this->QryGroup45}', \"QryGroup46\" = '{$this->QryGroup46}', \"QryGroup47\" = '{$this->QryGroup47}', \"QryGroup48\" = '{$this->QryGroup48}', \"QryGroup49\" = '{$this->QryGroup49}', \"QryGroup50\" = '{$this->QryGroup50}', \"QryGroup51\" = '{$this->QryGroup51}', \"QryGroup52\" = '{$this->QryGroup52}', \"QryGroup53\" = '{$this->QryGroup53}', \"QryGroup54\" = '{$this->QryGroup54}', \"QryGroup55\" = '{$this->QryGroup55}', \"QryGroup56\" = '{$this->QryGroup56}', \"QryGroup57\" = '{$this->QryGroup57}', \"QryGroup58\" = '{$this->QryGroup58}', \"QryGroup59\" = '{$this->QryGroup59}', \"QryGroup60\" = '{$this->QryGroup60}', \"QryGroup61\" = '{$this->QryGroup61}', \"QryGroup62\" = '{$this->QryGroup62}', \"QryGroup63\" = '{$this->QryGroup63}', \"QryGroup64\" = '{$this->QryGroup64}', \"UpdateDate\" = '{$this->UpdateDate}', \"PurPackMsr\" = '{$this->PurPackMsr}', \"PurPackUn\" = '{$this->PurPackUn}', \"SalPackMsr\" = '{$this->SalPackMsr}', \"SalPackUn\" = '{$this->SalPackUn}', \"validFor\" = '{$this->validFor}', \"frozenFor\" = '{$this->frozenFor}', \"SWW\" = {$this->SWW}, \"ShipType\" = '{$this->ShipType}', \"ByWh\" = '{$this->ByWh}', \"WTLiable\" = '{$this->WTLiable}', \"InvntryUom\" = '{$this->InvntryUom}', \"PlaningSys\" = '{$this->PlaningSys}', \"OrdrIntrvl\" = {$this->OrdrIntrvl}, \"OrdrMulti\" = '{$this->OrdrMulti}', \"MinOrdrQty\" = '{$this->MinOrdrQty}', \"LeadTime\" = '{$this->LeadTime}', \"IndirctTax\" = '{$this->IndirctTax}', \"TaxCodeAR\" = '{$this->TaxCodeAR}', \"TaxCodeAP\" = '{$this->TaxCodeAP}', \"UserSign2\" = '{$this->UserSign2}', \"ToleranDay\" = {$this->ToleranDay}, \"NoDiscount\" = '{$this->NoDiscount}', \"IWeight1\" = '{$this->IWeight1}', \"UpdateTS\" = '{$this->UpdateTS}', \"U_HBT_PRECIOXM2\" = '{$this->U_HBT_PRECIOXM2}', \"U_HBT_FAMILIA\" = '{$this->U_HBT_FAMILIA}', \"U_HBT_CATEGORIA\" = '{$this->U_HBT_CATEGORIA}', \"U_HBT_LINEA\" = '{$this->U_HBT_LINEA}', \"U_HBT_TIPOLISTA\" = '{$this->U_HBT_TIPOLISTA}', \"U_HBT_CODIGOTAB\" = '{$this->U_HBT_CODIGOTAB}', \"U_U_HBT_TABDTOGRU\" = '{$this->U_U_HBT_TABDTOGRU}', \"U_HBT_PREBASE\" = '{$this->U_HBT_PREBASE}', \"U_HBT_DTOPROV\" = '{$this->U_HBT_DTOPROV}', \"U_HBT_COSBASE\" = '{$this->U_HBT_COSBASE}', \"U_HBT_PORGASTOS\" = '{$this->U_HBT_PORGASTOS}', \"U_HBT_COSESTIMADO\" = '{$this->U_HBT_COSESTIMADO}', \"U_HBT_MARGENMIN\" = '{$this->U_HBT_MARGENMIN}', \"U_HBT_PORINCRE\" = '{$this->U_HBT_PORINCRE}', \"U_HBT_MUTIL\" = '{$this->U_HBT_MUTIL}', \"U_HBT_DTOMAX\" = '{$this->U_HBT_DTOMAX}', \"U_HBT_pvmc\" = '{$this->U_HBT_pvmc}', \"U_HBT_PVMP\" = '{$this->U_HBT_PVMP}', \"U_HBT_MUPVMP\" = '{$this->U_HBT_MUPVMP}', \"U_HBT_MUpvmc\" = '{$this->U_HBT_MUpvmc}', \"U_U_HBT_COSPROM\" = '{$this->U_U_HBT_COSPROM}', \"U_HBT_FLETES\" = '{$this->U_HBT_FLETES}', \"U_HBT_VRGASTOS\" = '{$this->U_HBT_VRGASTOS}', \"U_HBT_TABDTOADI\" = {$this->U_HBT_TABDTOADI}, \"U_HBT_FSMIN\" = '{$this->U_HBT_FSMIN}', \"U_HBT_FSMAX\" = '{$this->U_HBT_FSMAX}', \"U_HBT_USOCOSPROM\" = '{$this->U_HBT_USOCOSPROM}', \"U_HBT_FecIniDto\" = {$this->U_HBT_FecIniDto}, \"U_HBT_FecFinDto\" = {$this->U_HBT_FecFinDto}, \"U_HBT_NDTOMAX\" = '{$this->U_HBT_NDTOMAX}', \"U_HBT_MENSAJEMP\" = {$this->U_HBT_MENSAJEMP}, \"U_HBT_NomPlanograma\" = {$this->U_HBT_NomPlanograma}, \"U_HBT_UsuarioP1\" = {$this->U_HBT_UsuarioP1}, \"U_HBT_UsuarioP2\" = {$this->U_HBT_UsuarioP2}, \"U_HBT_UsuarioP3\" = {$this->U_HBT_UsuarioP3}, \"U_HBT_LAYOUT\" = {$this->U_HBT_LAYOUT}, \"U_HBT_ROL\" = '{$this->U_HBT_ROL}', \"U_HBT_Especialidad\" = '{$this->U_HBT_Especialidad}', \"U_HBT_DtoAdicional\" = {$this->U_HBT_DtoAdicional}, \"U_HBT_CODIGODET\" = '{$this->U_HBT_CODIGODET}', \"U_HBT_PREPARACION\" = '{$this->U_HBT_PREPARACION}', \"U_HBT_SERENVIOS\" = '{$this->U_HBT_SERENVIOS}', \"U_HBT_ACTTRANSNAC\" = '{$this->U_HBT_ACTTRANSNAC}', \"U_HBT_DESCCOMART\" = {$this->U_HBT_DESCCOMART}, \"U_HBT_ACTMAGENTO\" = '{$this->U_HBT_ACTMAGENTO}', \"U_HBT_ACTMAGENTOB2B\" = '{$this->U_HBT_ACTMAGENTOB2B}', \"U_HBT_ACTMAGENTOB2C\" = '{$this->U_HBT_ACTMAGENTOB2C}', \"U_HBT_PROVCORONA\" = '{$this->U_HBT_PROVCORONA}', \"U_HBT_Alineaprov\" = {$this->U_HBT_Alineaprov}, \"U_HBT_PlanoIntroDist\" = '{$this->U_HBT_PlanoIntroDist}', \"U_HBT_PlanoIntroSV\" = '{$this->U_HBT_PlanoIntroSV}', \"U_HBT_PlanoIntroConst\" = '{$this->U_HBT_PlanoIntroConst}', \"U_HBT_PlanoIntroInfra\" = '{$this->U_HBT_PlanoIntroInfra}', \"U_HBT_Marquilla\" = {$this->U_HBT_Marquilla}, \"U_HBT_PlanoIntroDistFE\" = '{$this->U_HBT_PlanoIntroDistFE}', \"U_HBT_PORTAFOLIO\" = '{$this->U_HBT_PORTAFOLIO}', \"U_HBT_DTOADIPROV\" = '{$this->U_HBT_DTOADIPROV}', \"U_HBT_FECDTOADIPRO\" = {$this->U_HBT_FECDTOADIPRO}, \"U_HBT_COSTOPRODUCTO\" = {$this->U_HBT_COSTOPRODUCTO} 
                          WHERE \"ItemCode\" = '{$this->ItemCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public function actualizarImagenes()
    {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"OITM\" 
                          SET \"PicturName\" = '{$this->PicturName}' 
                          WHERE \"ItemCode\" = '{$this->ItemCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public function eliminar()
    {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"OITM\" WHERE \"ItemCode\" = '{$this->ItemCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getLista($where = null, $order = null)
    {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"ItemCode\", \"ItemName\", \"FrgnName\", \"ItmsGrpCod\", \"CstGrpCode\", \"VatGourpSa\", \"CodeBars\", \"VATLiable\", \"PrchseItem\", \"SellItem\", \"InvntItem\", \"OnHand\", \"IsCommited\", \"OnOrder\", \"IncomeAcct\", \"ExmptIncom\", \"MaxLevel\", \"DfltWH\", \"CardCode\", \"SuppCatNum\", \"BuyUnitMsr\", \"NumInBuy\", \"ReorderQty\", \"MinLevel\", \"LstEvlPric\", \"LstEvlDate\", \"CustomPer\", \"Canceled\", \"MnufctTime\", \"WholSlsTax\", \"RetilrTax\", \"SpcialDisc\", \"DscountCod\", \"TrackSales\", \"SalUnitMsr\", \"NumInSale\", \"Consig\", \"QueryGroup\", \"Counted\", \"OpenBlnc\", \"EvalSystem\", \"UserSign\", \"FREE\", \"PicturName\", \"Transfered\", \"BlncTrnsfr\", \"UserText\", \"SerialNum\", \"CommisPcnt\", \"CommisSum\", \"CommisGrp\", \"TreeType\", \"TreeQty\", \"LastPurPrc\", \"LastPurCur\", \"LastPurDat\", \"ExitCur\", \"ExitPrice\", \"ExitWH\", \"AssetItem\", \"WasCounted\", \"ManSerNum\", \"SHeight1\", \"SHght1Unit\", \"SHeight2\", \"SHght2Unit\", \"SWidth1\", \"SWdth1Unit\", \"SWidth2\", \"SWdth2Unit\", \"SLength1\", \"SLen1Unit\", \"Slength2\", \"SLen2Unit\", \"SVolume\", \"SVolUnit\", \"SWeight1\", \"SWght1Unit\", \"SWeight2\", \"SWght2Unit\", \"BHeight1\", \"BHght1Unit\", \"BHeight2\", \"BHght2Unit\", \"BWidth1\", \"BWdth1Unit\", \"BWidth2\", \"BWdth2Unit\", \"BLength1\", \"BLen1Unit\", \"Blength2\", \"BLen2Unit\", \"BVolume\", \"BVolUnit\", \"BWeight1\", \"BWght1Unit\", \"BWeight2\", \"BWght2Unit\", \"FixCurrCms\", \"FirmCode\", \"LstSalDate\", \"QryGroup1\", \"QryGroup2\", \"QryGroup3\", \"QryGroup4\", \"QryGroup5\", \"QryGroup6\", \"QryGroup7\", \"QryGroup8\", \"QryGroup9\", \"QryGroup10\", \"QryGroup11\", \"QryGroup12\", \"QryGroup13\", \"QryGroup14\", \"QryGroup15\", \"QryGroup16\", \"QryGroup17\", \"QryGroup18\", \"QryGroup19\", \"QryGroup20\", \"QryGroup21\", \"QryGroup22\", \"QryGroup23\", \"QryGroup24\", \"QryGroup25\", \"QryGroup26\", \"QryGroup27\", \"QryGroup28\", \"QryGroup29\", \"QryGroup30\", \"QryGroup31\", \"QryGroup32\", \"QryGroup33\", \"QryGroup34\", \"QryGroup35\", \"QryGroup36\", \"QryGroup37\", \"QryGroup38\", \"QryGroup39\", \"QryGroup40\", \"QryGroup41\", \"QryGroup42\", \"QryGroup43\", \"QryGroup44\", \"QryGroup45\", \"QryGroup46\", \"QryGroup47\", \"QryGroup48\", \"QryGroup49\", \"QryGroup50\", \"QryGroup51\", \"QryGroup52\", \"QryGroup53\", \"QryGroup54\", \"QryGroup55\", \"QryGroup56\", \"QryGroup57\", \"QryGroup58\", \"QryGroup59\", \"QryGroup60\", \"QryGroup61\", \"QryGroup62\", \"QryGroup63\", \"QryGroup64\", \"CreateDate\", \"UpdateDate\", \"ExportCode\", \"SalFactor1\", \"SalFactor2\", \"SalFactor3\", \"SalFactor4\", \"PurFactor1\", \"PurFactor2\", \"PurFactor3\", \"PurFactor4\", \"SalFormula\", \"PurFormula\", \"VatGroupPu\", \"AvgPrice\", \"PurPackMsr\", \"PurPackUn\", \"SalPackMsr\", \"SalPackUn\", \"SCNCounter\", \"ManBtchNum\", \"ManOutOnly\", \"DataSource\", \"validFor\", \"validFrom\", \"validTo\", \"frozenFor\", \"frozenFrom\", \"frozenTo\", \"BlockOut\", \"ValidComm\", \"FrozenComm\", \"LogInstanc\", \"ObjType\", \"SWW\", \"Deleted\", \"DocEntry\", \"ExpensAcct\", \"FrgnInAcct\", \"ShipType\", \"GLMethod\", \"ECInAcct\", \"FrgnExpAcc\", \"ECExpAcc\", \"TaxType\", \"ByWh\", \"WTLiable\", \"ItemType\", \"WarrntTmpl\", \"BaseUnit\", \"CountryOrg\", \"StockValue\", \"Phantom\", \"IssueMthd\", \"FREE1\", \"PricingPrc\", \"MngMethod\", \"ReorderPnt\", \"InvntryUom\", \"PlaningSys\", \"PrcrmntMtd\", \"OrdrIntrvl\", \"OrdrMulti\", \"MinOrdrQty\", \"LeadTime\", \"IndirctTax\", \"TaxCodeAR\", \"TaxCodeAP\", \"OSvcCode\", \"ISvcCode\", \"ServiceGrp\", \"NCMCode\", \"MatType\", \"MatGrp\", \"ProductSrc\", \"ServiceCtg\", \"ItemClass\", \"Excisable\", \"ChapterID\", \"NotifyASN\", \"ProAssNum\", \"AssblValue\", \"DNFEntry\", \"UserSign2\", \"Spec\", \"TaxCtg\", \"Series\", \"Number\", \"FuelCode\", \"BeverTblC\", \"BeverGrpC\", \"BeverTM\", \"Attachment\", \"AtcEntry\", \"ToleranDay\", \"UgpEntry\", \"PUoMEntry\", \"SUoMEntry\", \"IUoMEntry\", \"IssuePriBy\", \"AssetClass\", \"AssetGroup\", \"InventryNo\", \"Technician\", \"Employee\", \"Location\", \"StatAsset\", \"Cession\", \"DeacAftUL\", \"AsstStatus\", \"CapDate\", \"AcqDate\", \"RetDate\", \"GLPickMeth\", \"NoDiscount\", \"MgrByQty\", \"AssetRmk1\", \"AssetRmk2\", \"AssetAmnt1\", \"AssetAmnt2\", \"DeprGroup\", \"AssetSerNo\", \"CntUnitMsr\", \"NumInCnt\", \"INUoMEntry\", \"OneBOneRec\", \"RuleCode\", \"ScsCode\", \"SpProdType\", \"IWeight1\", \"IWght1Unit\", \"IWeight2\", \"IWght2Unit\", \"CompoWH\", \"CreateTS\", \"UpdateTS\", \"VirtAstItm\", \"SouVirAsst\", \"InCostRoll\", \"PrdStdCst\", \"EnAstSeri\", \"LinkRsc\", \"OnHldPert\", \"onHldLimt\", \"PriceUnit\", \"GSTRelevnt\", \"SACEntry\", \"GstTaxCtg\", \"AssVal4WTR\", \"ExcImpQUoM\", \"ExcFixAmnt\", \"ExcRate\", \"SOIExc\", \"TNVED\", \"Imported\", \"AutoBatch\", \"CstmActing\", \"StdItemId\", \"CommClass\", \"TaxCatCode\", \"DataVers\", \"NVECode\", \"CESTCode\", \"CtrSealQty\", \"LegalText\", \"QRCodeSrc\", \"Traceable\", \"U_HBT_TerceroFacPro\", \"U_HBT_TerceroAmorti\", \"U_HBT_TerceroBaja\", \"U_IFRS_TERM\", \"U_IFRS_VENT\", \"U_IFRS_MARK\", \"U_IFRS_GTIA\", \"U_IFRS_Tiempo\", \"U_IFRS_ActPadre\", \"U_HBT_FecPoliza\", \"U_HBT_FecVtoGarn\", \"U_HBT_FecMantto\", \"U_IFRS_Tipo\", \"U_IFRS_EXCDET\", \"U_IFRS_TipoAF\", \"U_HBT_CANTM2\", \"U_HBT_PRECIOXM2\", \"U_HBT_FECHA_AR\", \"U_HBT_FAMILIA\", \"U_HBT_CATEGORIA\", \"U_HBT_LINEA\", \"U_HBT_TIPOLISTA\", \"U_HBT_CODIGOTAB\", \"U_U_HBT_TABDTOGRU\", \"U_HBT_PREBASE\", \"U_HBT_DTOPROV\", \"U_HBT_COSBASE\", \"U_HBT_PORGASTOS\", \"U_HBT_COSESTIMADO\", \"U_HBT_MARGENMIN\", \"U_HBT_PORINCRE\", \"U_HBT_MUTIL\", \"U_HBT_DTOMAX\", \"U_HBT_pvmc\", \"U_HBT_PVMP\", \"U_HBT_MUPVMP\", \"U_HBT_MUpvmc\", \"U_U_HBT_COSPROM\", \"U_HBT_FLETES\", \"U_HBT_FVOLUMEN\", \"U_HBT_DTOFAB\", \"U_HBT_CONCEPTO\", \"U_HBT_VRGASTOS\", \"U_PLU\", \"U_HBT_CodigoProducto\", \"U_HBT_TABDTOADI\", \"U_HBT_CodProductoFE\", \"U_HBT_POSICION\", \"U_HBT_CLASIFICACION\", \"U_HBT_CodVendedor\", \"U_HBT_AplicaAIU\", \"U_HBT_SUBGRUPO\", \"U_HBT_FSMIN\", \"U_HBT_FSMAX\", \"U_HBT_Modelo\", \"U_HBT_Marca\", \"U_HBT_BolsaPlas\", \"U_HBT_COMPENSACION\", \"U_HBT_VRCOMPENSACION\", \"U_HBT_USOCOSPROM\", \"U_HBT_FecIniDto\", \"U_HBT_FecFinDto\", \"U_HBT_NDTOMAX\", \"U_HBT_MENSAJEMP\", \"U_HBT_NomPlanograma\", \"U_HBT_PlanoDominante\", \"U_HBT_PlanoCompet\", \"U_HBT_UsuarioP1\", \"U_HBT_UsuarioP2\", \"U_HBT_UsuarioP3\", \"U_HBT_LAYOUT\", \"U_HBT_ROL\", \"U_HBT_Especialidad\", \"U_HBT_DtoAdicional\", \"U_HBT_CODIGODET\", \"U_HBT_PREPARACION\", \"U_HBT_SERENVIOS\", \"U_HBT_ACTTRANSNAC\", \"U_HBT_DESCCOMART\", \"U_HBT_ACTMAGENTO\", \"U_HBT_ACTMAGENTOB2B\", \"U_HBT_ACTMAGENTOB2C\", \"U_HBT_FirmCode\", \"U_HBT_PROVCORONA\", \"U_HBT_Alineaprov\", \"U_HBT_PlanoIntroDist\", \"U_HBT_PlanoIntroSV\", \"U_HBT_PlanoIntroConst\", \"U_HBT_PlanoIntroInfra\", \"U_HBT_Marquilla\", \"U_HBT_PlanoIntroSVFE\", \"U_HBT_PlanoIntroDistFE\", \"U_HBT_PORTAFOLIO\", \"U_HBT_DTOADIPROV\", \"U_HBT_FECDTOADIPRO\", \"U_HBT_COSTOPRODUCTO\", \"U_HBT_APLICADTOADIPRO\", \"U_HBT_COMPRADOR\", \"U_HBT_ValIBUA\", \"U_HBT_CantML\", \"U_HBT_ValINPP\", \"U_HBT_CantINPP\", \"U_HBT_ValICL\", \"U_HBT_CantICL\", \"U_HBT_BaseADV\" 
                              FROM \"SBOCASAANDINA\".\"OITM\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }
}