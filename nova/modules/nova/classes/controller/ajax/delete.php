<?php
/**
 * Nova's ajax controller.
 *
 * @package		Nova
 * @category	Controller
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */

namespace Nova;

class Controller_Ajax_Delete extends Controller_Base_Ajax
{
	public function action_formfield($id)
	{
		if (\Sentry::check() and \Sentry::user()->has_access('form.delete'))
		{
			// get the field
			$field = \Model_Form_Field::find($id);

			if ($field !== null)
			{
				$data = array(
					'name' => $field->label,
					'id' => $field->id,
				);

				echo \View::forge(\Location::file('delete/field', \Utility::get_skin('admin'), 'ajax'), $data);
			}
		}
	}

	public function action_formfield_value()
	{
		if (\Sentry::check() and \Sentry::user()->has_access('form.edit'))
		{
			// get the value
			$id = trim(\Security::xss_clean(\Input::post('id')));

			// grab the value from the database
			$value = \Model_Form_Value::find($id);

			// delete it
			$value->delete();

			\SystemEvent::add('user', '[[event.admin.form.field_delete|{{'.$value->label.'}}|{{'.$value->form_key.'}}]]');
		}
	}

	public function action_formsection($id)
	{
		if (\Sentry::check() and \Sentry::user()->has_access('form.delete'))
		{
			// get the section
			$section = \Model_Form_Section::find($id);

			// get all the sections
			$sections = \Model_Form_Section::get_sections($section->form_key);

			// remove the section we are deleting
			unset($sections[$id]);

			if ($section !== null)
			{
				$data = array(
					'name' => $section->name,
					'id' => $section->id,
					'sections' => $sections,
				);

				echo \View::forge(\Location::file('delete/section', \Utility::get_skin('admin'), 'ajax'), $data);
			}
		}
	}

	public function action_formtab($id)
	{
		if (\Sentry::check() and \Sentry::user()->has_access('form.delete'))
		{
			// get the tab
			$tab = \Model_Form_Tab::find($id);

			// get all the tabs
			$tabs = \Model_Form_Tab::get_tabs($tab->form_key);

			// remove the tab we are deleting
			unset($tabs[$id]);

			if ($tab !== null)
			{
				$data = array(
					'name' => $tab->name,
					'id' => $tab->id,
					'tabs' => $tabs,
				);

				echo \View::forge(\Location::file('delete/tab', \Utility::get_skin('admin'), 'ajax'), $data);
			}
		}
	}

	public function action_rankgroup($id)
	{
		if (\Sentry::check() and \Sentry::user()->has_access('rank.delete'))
		{
			// get the rank group
			$group = \Model_Rank_Group::find($id);

			if ($group !== null)
			{
				$data = array(
					'name' => $group->name,
					'id' => $group->id,
				);

				// get all the groups
				$groups = \Model_Rank_Group::find_items(true);

				// create an empty array
				$data['groups'] = array();

				if (count($groups) > 0)
				{
					foreach ($groups as $g)
					{
						if ($g->id != $id)
						{
							$data['groups'][$g->id] = $g->name;
						}
					}
				}

				echo \View::forge(\Location::file('delete/rankgroup', \Utility::get_skin('admin'), 'ajax'), $data);
			}
		}
	}

	public function action_rankinfo($id)
	{
		if (\Sentry::check() and \Sentry::user()->has_access('rank.delete'))
		{
			// get the rank info
			$info = \Model_Rank_Info::find($id);

			if ($info !== null)
			{
				$data = array(
					'name' => $info->name,
					'id' => $info->id,
				);

				// get all the info records
				$infoItems = \Model_Rank_Info::find_items(true);

				// create an empty array
				$data['infos'] = array();

				if (count($infoItems) > 0)
				{
					foreach ($infoItems as $i)
					{
						$group = lang('group', 1).' '.$i->group;

						if ($i->id != $id)
						{
							$data['infos'][$group][$i->id] = $i->name;
						}
					}
				}

				echo \View::forge(\Location::file('delete/rankinfo', \Utility::get_skin('admin'), 'ajax'), $data);
			}
		}
	}
}
