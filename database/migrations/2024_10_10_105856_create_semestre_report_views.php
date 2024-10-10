<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW semestre_report_views AS
        select distinct pr.candidat_id, us.first_name, us.last_name, us.email, us.gender, us.birth_date, 
	us.linkedin, ca.odcuser_id, ac.end_date as activdate_end, ac.title, ac.number_day, typecont.libelle as type_contrat, 
	empl.nomboite as entreprise, empl.poste, (ac.start_date) as startYear, cat.name as namecat, 
	typ.title as titletype, typ.code as typecode, ca.id as candid , pr.date as datepresence,
	attr.phone_number, attr.university, attr.speciality
from presences as pr
left join candidats as ca on pr.candidat_id = ca.id 
left join odcusers as us on ca.odcuser_id = us.id 
left join activites as ac on ca.activite_id = ac.id 
left join categories as cat on ac.categorie_id = cat.id 
left join activite_type_event as acty on ac.id = acty.activite_id 
left join type_events as typ on acty.type_event_id = typ.id 
left join employabilites as empl on us.id = empl.odcuser_id 
left join type_contrats as typecont on empl.type_contrat_id = typecont.id 
left join (
	select 
		MAX(
        case
		 	when cat.label like '%phone%' then  CAST(RIGHT(cat.value, 9) AS SIGNED) 
			when cat.label like '%telephone%' then  CAST(RIGHT(cat.value, 9) AS SIGNED)
        end
        ) AS phone_number, 
		MAX(cat.candidat_id) candidat_id,
		MAX(case
		 	when cat.label like '%Université%' then cat.value 
			when cat.label like '%Etablissement%' then cat.value 
			when cat.label like '%Structure%' then cat.value 
			when cat.label like '%Entreprise%' then cat.value
			when cat.label like '%Si autre université%' then cat.value 
			else
			od.detail_profession
			end ) as university,
		MAX(case
		 	when cat.label like '%Spécialité ou domaine (étude ou profession)%' then cat.value 
			when cat.label like '%Spécialité ou domaine%' then cat.value 
			when cat.label like '%Spécialité%' then cat.value 
			when cat.label like '%domaine%' then cat.value
			when cat.label like '%Specialite%' then cat.value 	
			when cat.label like '%Profession%' then cat.value
			else 
			od.profession 
			end ) as speciality
		from candidat_attributes cat
		left join candidats ca on cat.candidat_id  = ca.id
		left join odcusers od on ca.odcuser_id = od.id 
		-- where candidat_id = 1
		group by candidat_id 
	) as attr on ca.id = attr.candidat_id
where ac.title is not null  
order by ac.start_date 
asc, ac.title asc;
        
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semestre_report_views');
    }
};
