<?php namespace Movestar;

require_once __DIR__ . '/../db_record_php_7/record.php';


class Shipment extends \Record{

    const SUITE = 'MOVESTAR';
    const DRIVER = 'mssql';
    const DB = '[EDC-MOVESTAR]';
    const TABLE = 'tbl_shipment';
    const PRIMARYKEY = 'Reference';

    public $MoveStarID;
    public $CreatedOn;
    public $ModifiedOn;
    public $RegistrationID;
    public $EstimatedID;
    public $Reference;
    public $SCAC;
    public $AssignedTo;
    public $WebStatus;
    public $Status;
    public $FirstName;
    public $LastName;
    public $SSN;
    public $Type;
    public $Market;
    public $COS;
    public $Channel;
    public $PrimaryEmail;
    public $SecondaryEmail;
    public $PrimaryPhone;
    public $SecondaryPhone;
    public $OriginGBLOC;
    public $DestinationGBLOC;
    public $BookedWeight;
    public $SurveyedWeight;
    public $ActualGrossWeight;
    public $ActualTareWeight;
    public $ActualNetWeight;
    public $ProgearWeight1;
    public $ProgearWeight2;
    public $OverflowWeight;
    public $OFGrossWeight;
    public $OFTareWeight;
    public $ReweighGrossWeight;
    public $ReweighTareWeight;
    public $BookedDate;
    public $RequestedPackDate;
    public $RequestedPickupDate;
    public $RequestedDeliveryDate;
    public $RequiredDeliveryDate;
    public $PlannedPackDate;
    public $PlannedPickupDate;
    public $PlannedDeliveryDate;
    public $ActualPickupDate;
    public $ActualDeliveryDate;
    public $ScheduledDeliveryDate;
    public $IntransitDate;
    public $ArrivalDate;
    public $CustomerArrivalDate;
    public $SurveyMethod;
    public $SurveyDate;
    public $OriginAddress1;
    public $OriginAddress2;
    public $OriginCity;
    public $OriginState;
    public $OriginCounty;
    public $OriginZip;
    public $OriginCountry;
    public $DestinationAddress1;
    public $DestinationAddress2;
    public $DestinationCity;
    public $DestinationState;
    public $DestinationCounty;
    public $DestinationZip;
    public $DestinationCountry;
    public $Carrier;
    public $CarrierAgentID;
    public $OriginAgent;
    public $OriginAgentID;
    public $DestinationAgent;
    public $DestinationAgentID;
    public $Hauler;
    public $HaulerID;
    public $HaulingCarrier;
    public $HaulingCarrierAgentID;
    public $Driver;
    public $DriverLattitude;
    public $DriverLongitude;
    public $ReleasedBy;
    public $ReceivedBy;
    public $Miles;
    public $Tariff;
    public $Rate;
    public $SITRate;
    public $BaseLineHaul;
    public $EstimatedLineHaul;
    public $ActualLineHaul;
    public $MilitaryBranch;
    public $MilitaryRank;
    public $Branch;
    public $ReleasingAgent;
    public $ReceivingAgent;
    public $OriginPhoneNote;
    public $DestinationPhoneNote;
    public $CreatedBy;
    public $CustomerRep;
    public $ETA;
    public $CanCreateCSS;
    public $ShowCSS;
    public $CanSendClaims;
    public $OrdersNumber;
    public $OrdersDate;
    public $TAC;
    public $MDC;
    public $zzLOA;
    public $FA2;
    public $FromShipmentQueue;
    public $TCNNumber;
    public $PropertyOwnerInfo;
    public $HasGBL;
    public $Deleted;

    public function __construct($id = null){
        parent::__construct(self::SUITE,self::DRIVER,self::DB,self::TABLE,self::PRIMARYKEY,$id);
    }
    public static function get($key,$value){
        $ids = array();
        $data = array();
        $results = $GLOBALS['db']
            ->suite(self::SUITE)
            ->driver(self::DRIVER)
            ->database(self::DB)
            ->table(self::TABLE)
            ->select(self::PRIMARYKEY)
            ->where($key,"=",$value)
            ->get();
        while($row = sqlsrv_fetch_array($results,SQLSRV_FETCH_ASSOC)){
            $ids[] = $row[self::PRIMARYKEY];
        }
        foreach($ids as $id){
            $data[] = new self($id);
        }
        return $data;
    }
}